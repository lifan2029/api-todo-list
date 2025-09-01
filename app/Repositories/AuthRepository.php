<?php

namespace App\Repositories;

use App\Models\User;

class AuthRepository
{
    public function store(array $data): User
    {
        return User::create($data);
    }
}