<?php

namespace Modules\Platform\Auth\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Platform\Auth\Application\Refresh\RefreshToken;
use Modules\Platform\Auth\Http\Requests\RefreshTokenRequest;
use Modules\Shared\Http\ApiResponse;

class RefreshTokenController extends Controller
{
    public function __invoke(
        RefreshTokenRequest $request,
        RefreshToken $refreshToken
    ) {
        $result = $refreshToken->execute(
            $request->refresh_token
        );

        if (isset($result['error'])) {
            return ApiResponse::fromErrorCode($result['error']);
        }

        return ApiResponse::success($result);
    }
}
