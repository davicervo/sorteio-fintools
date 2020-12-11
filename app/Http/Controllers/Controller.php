<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function jsonResponse(bool $status, string $message, array $data = [], int $statusCode = 200)
    {
        return response()->json([
            'success' => $status,
            'message' => $message,
            'data' => $data
        ], $statusCode);
    }
}
