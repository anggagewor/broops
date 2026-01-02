<?php

namespace Modules\Platform\Auth\Application\Login;

use Modules\Platform\Auth\Application\Errors\AuthError;
use Modules\Platform\Auth\Domain\Contracts\TokenRepository;
use Modules\Platform\Auth\Domain\Contracts\UserRepository;
use Modules\Platform\Auth\Domain\Contracts\PasswordHasher;
use Modules\Platform\Auth\Domain\Contracts\TokenIssuer;
readonly class LoginUser
{
    public function __construct(
        private UserRepository $users,
        private PasswordHasher $hasher,
        private TokenIssuer    $issuer,
        private TokenRepository $tokens
    ) {}

    public function execute(string $email, string $password): array
    {
        $user = $this->users->findByEmail($email);

        if (! $user || ! $user->isActive) {
            return ['error' => AuthError::INVALID_CREDENTIALS];
        }

        if (! $this->hasher->verify($password, $user->passwordHash)) {
            return ['error' => AuthError::INVALID_CREDENTIALS];
        }

        $accessToken  = $this->issuer->issueAccessToken($user);
        $refreshToken = $this->issuer->issueRefreshToken($user);

        $this->tokens->saveRefreshToken($refreshToken);

        return [
            'user' => [
                'id'    => $user->id,
                'email' => $user->email,
            ],
            'token' => [
                'access'  => $accessToken,
                'refresh' => $refreshToken->token,
            ],
        ];
    }
}

