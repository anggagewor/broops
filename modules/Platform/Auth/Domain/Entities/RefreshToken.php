<?php

namespace Modules\Platform\Auth\Domain\Entities;

use Carbon\Carbon;

final readonly class RefreshToken
{
    public function __construct(
        public string $token,
        public int    $userId,
        public Carbon $expiresAt,
        public string $device_id,
    ) {}

    public function isExpired(): bool
    {
        return $this->expiresAt->isPast();
    }
}
