<?php

namespace Modules\Platform\Auth\Application\Refresh;

use Modules\Platform\Auth\Application\Errors\AuthError;
use Modules\Platform\Auth\Domain\Contracts\TokenRepository;
use Modules\Platform\Auth\Domain\Contracts\TokenIssuer;

readonly class RefreshToken
{
    public function __construct(
        private TokenRepository $tokens,
        private TokenIssuer $issuer
    ) {}

    public function execute(string $refreshToken): array
    {
        $token = $this->tokens->findRefreshToken($refreshToken);

        if (! $token) {
            return [
                'error' => AuthError::REFRESH_TOKEN_INVALID,
            ];
        }

        if ($token->isExpired()) {
            return [
                'error' => AuthError::REFRESH_TOKEN_EXPIRED,
            ];
        }

        $user = $token->user();

        return [
            'token' => $this->issuer->issue($user),
        ];
    }
}
