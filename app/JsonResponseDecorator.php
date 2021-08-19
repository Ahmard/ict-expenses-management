<?php

namespace App;

use Illuminate\Http\JsonResponse;

class JsonResponseDecorator
{
    public static function success(mixed $data, int $status = 200, array $headers = []): JsonResponse
    {
        return response()->json(
            [
                'success' => true,
                'status' => 200,
                'data' => $data,
            ],
            $status,
            $headers
        );
    }

    public static function error(mixed $data, int $status = 500, array $headers = []): JsonResponse
    {
        return response()->json(
            [
                'success' => false,
                'status' => 500,
                'data' => $data,
            ],
            $status,
            $headers
        );
    }
}
