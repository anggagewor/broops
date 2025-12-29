<?php

namespace Modules\Platform\Auth\Domain\Contracts;

interface PasswordHasher
{
    public function verify(string $plain, string $hash): bool;
    public function hash(string $plain): string;

}
