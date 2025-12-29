<?php

namespace Modules\Platform\Auth\Infrastructure\Persistence;

use Modules\Platform\Auth\Domain\Contracts\TokenRepository;
use Modules\Platform\Auth\Domain\Entities\RefreshToken;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseTokenRepository implements TokenRepository
{
    public function findRefreshToken(string $token): ?RefreshToken
    {
        $hashed = hash('sha256', $token);

        $row = DB::table('refresh_tokens')
            ->where('token', $hashed)
            ->whereNull('revoked_at')
            ->first();

        if (! $row) {
            return null;
        }

        return new RefreshToken(
            token: $token, // RAW token tetep di domain
            userId: $row->user_id,
            expiresAt: Carbon::parse($row->expires_at)
        );
    }

    public function saveRefreshToken(RefreshToken $token): void
    {
        DB::table('refresh_tokens')->insert([
            'user_id'    => $token->userId,
            'token'      => hash('sha256', $token->token),
            'expires_at' => $token->expiresAt,
            'created_at' => now(),
        ]);
    }

    public function revokeRefreshToken(string $token): void
    {
        DB::table('refresh_tokens')
            ->where('token', hash('sha256', $token))
            ->update([
                'revoked_at' => now(),
            ]);
    }
}
