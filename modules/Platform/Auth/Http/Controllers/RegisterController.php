<?php

namespace Modules\Platform\Auth\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Platform\Auth\Application\Register\RegisterUser;
use Modules\Platform\Auth\Http\Requests\RegisterRequest;
use Modules\Shared\Http\ApiResponse;

class RegisterController extends Controller
{
    public function __invoke(
        RegisterRequest $request,
        RegisterUser $registerUser
    ) {
        $result = $registerUser->execute(
            email: $request->email,
            password: $request->password
        );

        if (isset($result['error'])) {
            return ApiResponse::fromErrorCode($result['error']);
        }

        return ApiResponse::success(
            data: $result,
            status: 201
        );
    }
}
