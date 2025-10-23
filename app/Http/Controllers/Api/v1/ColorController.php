<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\ColorService;
use Illuminate\Http\JsonResponse;

class ColorController
{
    public function __construct(
        private readonly ColorService $colorService
    ) {
    }

    public function getAll(): JsonResponse
    {
        return response()->json([
            'priorities' => $this->colorService->getAll()
        ]);
    }
}