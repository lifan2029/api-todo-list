<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends BaseRepository
{
    public function getPaginated(array $params = [])
    {
        $query = Task::where('user_id', auth()->id());

        $query = $this->applyOrderBy($query, $params);

        $query = $this->queryApplyPagination($query, $params);

        return $query->paginate($params['perPage'] ?? self::BY);
    }

    public function store(array $data): Task
    {
        return Task::create($data);
    }
}