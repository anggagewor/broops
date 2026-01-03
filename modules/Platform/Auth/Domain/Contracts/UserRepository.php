<?php

namespace Modules\Platform\Auth\Domain\Contracts;

use Modules\Platform\Auth\Domain\Entities\User;

interface UserRepository
{
    public function findByEmail(string $email): ?User;
    public function findById(int $id): ?User;
    public function create(string $email, string $passwordHash, string $name): User;

}
