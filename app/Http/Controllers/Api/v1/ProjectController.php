<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Project\IndexRequest;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;
use App\Models\Project;
use App\Services\ProjectService;
use Illuminate\Http\JsonResponse;

class ProjectController
{
    public function __construct(
        private readonly ProjectService $projectService
    ) {
    }

    public function getPaginated(IndexRequest $request): JsonResponse
    {
        return response()->json([
            'projects' => $this->projectService->getPaginated($request->validated())
        ]);
    }

    public function store(StoreRequest $request): JsonResponse
    {
        return response()->json([
            'project' => $this->projectService->store($request->validated())
        ]);
    }

    public function update(Project $project, UpdateRequest $request): JsonResponse
    {
        return response()->json([
            'project' => $this->projectService->update($project, $request->validated())
        ]);
    }

    public function delete(Project $project): JsonResponse
    {
        $this->projectService->delete($project);

        return response()->json([
            'message' => __('project.deleted')
        ]);
    }
}