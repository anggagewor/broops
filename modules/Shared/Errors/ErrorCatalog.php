<?php

namespace Modules\Shared\Errors;

class ErrorCatalog
{
    public static function get(string $code): array
    {
        return self::map()[$code] ?? self::unknown();
    }

    private static function map(): array
    {
        return [
            // 🔐 AUTH
            'AUTH_INVALID_CREDENTIALS' => [
                'http'    => 401,
                'message' => 'Invalid credentials',
            ],
            'AUTH_USER_INACTIVE' => [
                'http'    => 403,
                'message' => 'User is inactive',
            ],
            'AUTH_EMAIL_ALREADY_EXISTS' => [
                'http' => 409,
                'message' => 'Email already registered',
            ],

            // 🌍 COMMON
            'COMMON_UNAUTHORIZED' => [
                'http'    => 401,
                'message' => 'Unauthorized',
            ],
        ];
    }

    private static function unknown(): array
    {
        return [
            'http'    => 500,
            'message' => 'Unknown error',
        ];
    }
}
