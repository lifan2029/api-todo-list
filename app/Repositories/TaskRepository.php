<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends BaseRepository
{
    public function getAll(array $params = [])
    {
        $query = Task::where('user_id', auth()->id());

        $query = $this->applyOrderBy($query, $params);

        return $this->queryApplyPagination($query, $params);
    }

    public function store(array $data): Task
    {
        return Task::create($data);
    }
}