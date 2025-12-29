<?php

namespace Modules\Platform\Auth\Infrastructure\Security;

use Illuminate\Support\Facades\Hash;
use Modules\Platform\Auth\Domain\Contracts\PasswordHasher;

class LaravelPasswordHasher implements PasswordHasher
{
    public function verify(string $plain, string $hash): bool
    {
        return Hash::check($plain, $hash);
    }
    public function hash(string $plain): string
    {
        return Hash::make($plain);
    }

}
