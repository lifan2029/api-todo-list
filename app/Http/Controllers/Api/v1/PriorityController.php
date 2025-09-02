<?php

namespace App\Http\Controllers\Api\V1;

use App\Services\PriorityService;
use Illuminate\Http\JsonResponse;

class PriorityController
{
    public function __construct(
        private readonly PriorityService $priorityService
    ) {
    }

    public function getAll(): JsonResponse
    {
        return response()->json([
            'priorities' => $this->priorityService->getAll()
        ]);
    }
}