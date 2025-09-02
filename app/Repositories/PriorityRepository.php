<?php

namespace App\Repositories;

use App\Models\Priority;
use Illuminate\Database\Eloquent\Collection;

class PriorityRepository extends BaseRepository
{
    public function getAll(array $params = []): Collection
    {
        return Priority::query()
            ->orderBy('level', 'asc')
            ->get();
    }
}