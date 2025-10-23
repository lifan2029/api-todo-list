<?php

namespace App\Repositories;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

class ColorRepository extends BaseRepository
{
    public function getAll(): Collection
    {
        return Color::get();
    }
}