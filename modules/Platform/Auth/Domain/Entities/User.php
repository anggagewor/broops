<?php

namespace Modules\Platform\Auth\Domain\Entities;

readonly class User
{
    public function __construct(
        public int    $id,
        public string $email,
        public string $passwordHash,
        public string $name,
        public bool   $isActive,
    ) {}
}
