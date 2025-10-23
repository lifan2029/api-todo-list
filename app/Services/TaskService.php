<?php

namespace App\Services;

use App\Http\Resources\v1\Task\ShowResource;
use App\Http\Resources\v1\Task\IndexResource;
use App\Models\Task;
use App\Repositories\TaskRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class TaskService
{
    public function __construct(
        private readonly TaskRepository $taskRepository
    ) {
    }

    public function getPaginated(array $params = []): array
    {
        $paginated = $this->taskRepository->getPaginated($params);

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
            $this->taskRepository->store($data)
        );
    }

    public function update(Task $task, array $data): ShowResource
    {
        if ($task->user_id !== auth()->id()) {
            throw new BadRequestHttpException(__('messages.task_not_your'));
        }

        $task->update($data);

        return new ShowResource($task);
    }

    public function setComplete(Task $task): ShowResource
    {
        if ($task->user_id !== auth()->id()) {
            throw new BadRequestHttpException(__('messages.task_not_your'));
        }

        $task->update([
            'is_completed' => true,
            'completed_at' => now(),
        ]);

        return new ShowResource($task);
    }

    public function delete(Task $task): void
    {
        if ($task->user_id !== auth()->id()) {
            throw new BadRequestHttpException(__('messages.task_not_your'));
        }

        $task->delete();
    }
}