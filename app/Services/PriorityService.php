<?php

namespace App\Services;

use App\Repositories\PriorityRepository;
use Illuminate\Database\Eloquent\Collection;

class PriorityService
{
    public function __construct(
        private readonly PriorityRepository $priorityRepository
    ) {
    }

    public function getAll(array $params = []): Collection
    {
        return $this->priorityRepository->getAll($params);
    }
}