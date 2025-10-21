<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::create([
            'user_id' => 1,
            'title' => 'Sample Task',
            'description' => 'This is a sample task description.',
            'due_date' => now()->addDays(7),
            'priority_id' => 1,
            'is_completed' => false,
        ]);
    }
}
