<?php

namespace App\Services;

use App\Repositories\ColorRepository;
use Illuminate\Database\Eloquent\Collection;

class ColorService
{
    public function __construct(
        private readonly ColorRepository $colorRepository
    ) {
    }

    public function getAll(): Collection
    {
        return $this->colorRepository->getAll();
    }
}