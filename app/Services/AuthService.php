<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\AuthRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

class AuthService
{
    public function __construct(
        private readonly AuthRepository $authRepository
    ) {
    }

    public function login(array $data): ?string
    {
        if (!$token = auth()->attempt($data)) {
            throw new BadRequestHttpException(__('auth.failed'));
        }

        return $token;
    }

    public function register(array $data): User
    {
        return $this->authRepository->store($data);
    }
}