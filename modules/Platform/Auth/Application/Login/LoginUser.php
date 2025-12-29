<?php

namespace Modules\Platform\Auth\Application\Login;

use Modules\Platform\Auth\Application\Errors\AuthError;
use Modules\Platform\Auth\Domain\Contracts\UserRepository;
use Modules\Platform\Auth\Domain\Contracts\PasswordHasher;
use Modules\Platform\Auth\Domain\Contracts\TokenIssuer;

readonly class LoginUser
{
    public function __construct(
        private UserRepository $users,
        private PasswordHasher $hasher,
        private TokenIssuer    $tokens
    ) {}

    public function execute(string $email, string $password): array
    {
        $user = $this->users->findByEmail($email);

        if (! $user) {
            return ['error' => AuthError::INVALID_CREDENTIALS];
        }

        if (! $user->isActive) {
            return ['error' => AuthError::USER_INACTIVE];
        }

        if (! $this->hasher->verify($password, $user->passwordHash)) {
            return ['error' => AuthError::INVALID_CREDENTIALS];
        }

        return [
            'user'  => [
                'id'    => $user->id,
                'email' => $user->email,
            ],
            'token' => $this->tokens->issue($user),
        ];
    }
}
