<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::post('/auth/login', \Modules\Platform\Auth\Http\Controllers\LoginController::class);
Route::post('/auth/register', \Modules\Platform\Auth\Http\Controllers\RegisterController::class);


Route::middleware('jwt')->group(function () {
    Route::get('/me', function (Request $request) {
        $user = $request->attributes->get('auth_user');

        return [
            'id' => $user->id,
            'email' => $user->email,
        ];
    });
});
