<?php

namespace App\Services;

use App\Http\Resources\v1\Project\IndexResource;
use App\Http\Resources\v1\Project\ShowResource;
use App\Models\Project;
use App\Repositories\ProjectRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class ProjectService
{
    public function __construct(
        private readonly ProjectRepository $projectRepository
    ) {
    }

    public function getPaginated(array $params = []): array
    {
        $paginated = $this->projectRepository->getPaginated($params);

        return [
            'pages' => $paginated->lastPage(),
            'total' => $paginated->total(),
            'current_page' => $paginated->currentPage(),
            'properties' => IndexResource::collection($paginated->items()),
        ];
    }

    public function store(array $data): ShowResource
    {
        return new ShowResource(
            $this->projectRepository->store($data)
        );
    }

    public function update(Project $project, array $data): ShowResource
    {
        if ($project->user_id !== auth()->id()) {
            throw new BadRequestHttpException(__('messages.project_not_your'));
        }

        $project->update($data);

        return new ShowResource($project);
    }

    public function delete(Project $project): void
    {
        if ($project->user_id !== auth()->id()) {
            throw new BadRequestHttpException(__('messages.project_not_your'));
        }

        $project->delete();
    }
}