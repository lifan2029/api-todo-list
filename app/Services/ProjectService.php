<?php

namespace App\Services;

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
            'properties' => $paginated->items(),
        ];
    }

    public function store(array $data): Project
    {
        return $this->projectRepository->store($data);
    }

    public function update(Project $project, array $data): Project
    {
        if ($project->user_id !== auth()->id()) {
            throw new BadRequestHttpException(__('messages.project_not_your'));
        }

        $project->update($data);

        return $project;
    }

    public function delete(Project $project): void
    {
        if ($project->user_id !== auth()->id()) {
            throw new BadRequestHttpException(__('messages.project_not_your'));
        }

        $project->delete();
    }
}