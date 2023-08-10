<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function successResponse(string $message = null, mixed $data = null): JsonResponse
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'errors' => [],
            'data' => $data
        ], 200);
    }

    public function errorResponse(string $message = 'Server Error', mixed $errors = null, mixed $data = null, int $statusCode = 500): JsonResponse
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'errors' => $errors,
            'data' => $data
        ], $statusCode);
    }
}
