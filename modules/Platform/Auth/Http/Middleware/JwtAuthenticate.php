<?php

namespace Modules\Platform\Auth\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Modules\Platform\Auth\Domain\Contracts\UserRepository;

readonly class JwtAuthenticate
{
    public function __construct(
        private UserRepository $users
    ) {}

    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization');

        if (! $header || ! str_starts_with($header, 'Bearer ')) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $token = substr($header, 7);

        try {
            $payload = JWT::decode(
                $token,
                new Key(config('jwt.jwt_secret'), 'HS256')
            );
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Invalid or expired token'
            ], 401);
        }

        $user = $this->users->findById((int) $payload->sub);

        if (! $user) {
            return response()->json([
                'message' => 'User not found'
            ], 401);
        }

        // attach ke request (tanpa Laravel Auth)
        $request->attributes->set('auth_user', $user);

        return $next($request);
    }
}
