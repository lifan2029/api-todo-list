<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation(): void
    {
        $this->merge([
            'user_id' => auth()->id(),
            'description' => $this->description ?? '',
            'due_date' => $this->due_date ?? '',
        ]);
    }

    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['sometimes', 'string', 'nullable'],
            'due_date' => ['sometimes', 'date', 'nullable'],
            'priority_id' => ['sometimes', 'integer', 'exists:priorities,id', 'nullable'],
            'parent_id' => ['sometimes', 'integer', 'exists:tasks,id', 'nullable'],
        ];
    }
}
