<?php

namespace Modules\Platform\Auth\Infrastructure\Security;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Support\Str;
use Modules\Platform\Auth\Domain\Contracts\TokenIssuer;
use Modules\Platform\Auth\Domain\Entities\RefreshToken;
use Modules\Platform\Auth\Domain\Entities\User;

class JwtTokenIssuer implements TokenIssuer
{
    public function issue(User $user): array
    {
        $now = time();

        $payload = [
            'iss' => config('app.url'),
            'sub' => $user->id,
            'email' => $user->email,
            'iat' => $now,
            'exp' => $now + (60 * 60), // 1 jam
        ];

        $accessToken = JWT::encode(
            $payload,
            config('app.key'),
            'HS256'
        );

        return [
            'access_token' => $accessToken,
            'token_type'   => 'Bearer',
            'expires_in'   => 3600,
        ];
    }

    public function issueAccessToken(User $user): string
    {
        return JWT::encode(
            [
                'sub' => $user->id,
                'iat' => time(),
                'exp' => time() + (15 * 60),
            ],
            config('auth.jwt_secret'),
            'HS256'
        );
    }

    public function issueRefreshToken(User $user): RefreshToken
    {
        return new RefreshToken(
            token: Str::random(64),
            userId: $user->id,
            expiresAt: now()->addDays(30)
        );
    }
}
