<?php

namespace Modules\Platform\Auth\Application\Register;

use Modules\Platform\Auth\Domain\Contracts\UserRepository;
use Modules\Platform\Auth\Domain\Contracts\PasswordHasher;
use Modules\Platform\Auth\Domain\Contracts\TokenIssuer;
use Modules\Platform\Auth\Application\Errors\AuthError;

readonly class RegisterUser
{
    public function __construct(
        private UserRepository $users,
        private PasswordHasher $hasher,
        private TokenIssuer    $tokens
    ) {}

    public function execute(string $email, string $password): array
    {
        if ($this->users->findByEmail($email)) {
            return ['error' => AuthError::EMAIL_ALREADY_EXISTS];
        }

        $user = $this->users->create(
            email: $email,
            passwordHash: $this->hasher->hash($password)
        );

        return [
            'user'  => [
                'id'    => $user->id,
                'email' => $user->email,
            ],
            'token' => $this->tokens->issue($user),
        ];
    }
}
