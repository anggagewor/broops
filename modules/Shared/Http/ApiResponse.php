<?php

namespace Modules\Shared\Http;

use Illuminate\Http\JsonResponse;
use Modules\Shared\Errors\ErrorCatalog;

class ApiResponse
{
    public static function success(
        mixed $data = null,
        array $meta = [],
        int $status = 200
    ): JsonResponse {
        return response()->json([
            'success' => true,
            'data'    => $data,
            'meta'    => $meta,
        ], $status);
    }

    public static function error(
        string $code,
        string $message,
        int $status = 400
    ): JsonResponse {
        return response()->json([
            'success' => false,
            'error'   => [
                'code'    => $code,
                'message' => $message,
            ],
        ], $status);
    }

    public static function fromErrorCode(string $code): JsonResponse
    {
        $error = ErrorCatalog::get($code);

        return self::error(
            code: $code,
            message: $error['message'],
            status: $error['http']
        );
    }
}
