<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    public function run(): void
    {
        Priority::upsert([
            ['id' => 1, 'name' => 'Low', 'color' => '#ffffff'],
            ['id' => 2, 'name' => 'Medium', 'color' => '#34D399'],
            ['id' => 3, 'name' => 'High', 'color' => '#FBBF24'],
            ['id' => 4, 'name' => 'Urgent', 'color' => '#EF4444'],
        ], ['id'], ['name', 'color']);
    }
}
