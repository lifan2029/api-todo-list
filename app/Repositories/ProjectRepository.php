<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends BaseRepository
{
    public function getPaginated(array $params = [])
    {
        $query = Project::where('user_id', auth()->id());

        $query = $this->applyOrderBy($query, $params);

        $query = $this->queryApplyPagination($query, $params);

        return $query->paginate($params['perPage'] ?? self::BY);
    }

    public function store(array $data): Project
    {
        return Project::create($data);
    }
}