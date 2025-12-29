<?php

namespace Modules\Platform\Auth\Domain\Contracts;

use Modules\Platform\Auth\Domain\Entities\RefreshToken;

interface TokenRepository
{
    public function findRefreshToken(string $token): ?RefreshToken;

    public function saveRefreshToken(RefreshToken $token): void;

    public function revokeRefreshToken(string $token): void;
}
