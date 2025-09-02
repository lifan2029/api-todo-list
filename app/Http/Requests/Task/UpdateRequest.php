<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['sometimes', 'string', 'max:255'],
            'description' => ['sometimes', 'string', 'nullable'],
            'due_date' => ['sometimes', 'date', 'nullable'],
            'priority_id' => ['sometimes', 'integer', 'exists:priorities,id', 'nullable'],
            'parent_id' => ['sometimes', 'integer', 'exists:tasks,id', 'nullable'],
        ];
    }
}
