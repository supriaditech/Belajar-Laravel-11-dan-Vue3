<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ResponseFormatter extends Controller
{
    /**  
     * Format response API.  
     *  
     * @param mixed $data  
     * @param string $status  
     * @param string $message  
     * @param int $httpStatus  
     * @return JsonResponse  
     */
    protected function apiResponse($data = null, $status = 'success', $message = '', $httpStatus = 200): JsonResponse
    {
        return response()->json([
            'meta' => [
                'status' => $status,
                'message' => $message,
            ],
            'data' => $data,
        ], $httpStatus);
    }
}
