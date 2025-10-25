<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Builder;

class TaskRepository extends BaseRepository
{
    public function getPaginated(array $params = [])
    {
        $query = Task::where('user_id', auth()->id());

        $query = $this->applyFilter($query, $params);

        $query = $this->applyOrderBy($query, $params);

        $query = $this->queryApplyPagination($query, $params);

        return $query->paginate($params['perPage'] ?? self::BY);
    }

    public function store(array $data): Task
    {
        return Task::create($data);
    }

    private function applyFilter(Builder $query, array $params): Builder
    {
        if (isset($params['search'])) {
            $query->where(function (Builder $q) use ($params) {
                $q->where('title', 'like', '%' . $params['search'] . '%')
                  ->orWhere('description', 'like', '%' . $params['search'] . '%');
            });
        }

        return $query;
    }
}