<?php

namespace Modules\Platform\Auth\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Platform\Auth\Application\Login\LoginUser;
use Modules\Platform\Auth\Http\Requests\LoginRequest;
use Modules\Shared\Http\ApiResponse;

class LoginController extends Controller
{
    public function __invoke(LoginRequest $request, LoginUser $loginUser)
    {
        $result = $loginUser->execute(
            email: $request->email,
            password: $request->password
        );

        if (isset($result['error'])) {
            return ApiResponse::fromErrorCode($result['error']);
        }

        return ApiResponse::success($result);
    }
}
