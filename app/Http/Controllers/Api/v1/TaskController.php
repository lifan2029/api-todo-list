<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Task\IndexRequest;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use App\Models\Task;
use App\Services\TaskService;
use Illuminate\Http\JsonResponse;

class TaskController
{
    public function __construct(
        private readonly TaskService $taskService
    ) {
    }

    public function getAll(IndexRequest $request): JsonResponse
    {
        return response()->json([
            'tasks' => $this->taskService->getAll($request->validated())
        ]);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        return response()->json([
            'task' => $this->taskService->store($request->validated())
        ]);
    }

    public function update(Task $task, UpdateRequest $request): JsonResponse
    {
        return response()->json([
            'task' => $this->taskService->update($task, $request->validated())
        ]);
    }

    public function delete(Task $task): JsonResponse
    {
        $this->taskService->delete($task);

        return response()->json([
            'message' => __('task.deleted')
        ]);
    }
}