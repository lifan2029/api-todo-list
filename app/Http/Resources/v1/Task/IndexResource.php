<?php

namespace App\Http\Resources\v1\Task;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Task */
class IndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'is_completed' => $this->is_completed,
            'due_date' => $this->due_date,
            'priority' => $this->priority,
            'parent' => $this->parent,
            'completed_at' => $this->completed_at,
            'created_at' => $this->created_at,
        ];
    }
}
