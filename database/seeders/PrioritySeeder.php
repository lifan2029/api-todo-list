<?php

namespace Database\Seeders;

use App\Enums\ColorEnum;
use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    public function run(): void
    {
        Priority::upsert([
            ['id' => 1, 'name' => 'Low', 'color_id' => ColorEnum::WHITE->value],
            ['id' => 2, 'name' => 'Medium', 'color_id' => ColorEnum::GREEN->value],
            ['id' => 3, 'name' => 'High', 'color_id' => ColorEnum::YELLOW->value],
            ['id' => 4, 'name' => 'Urgent', 'color_id' => ColorEnum::RED->value],
        ], ['id'], ['name', 'color_id']);
    }
}
