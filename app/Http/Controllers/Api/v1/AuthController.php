<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthController
{
    public function __construct(
        private readonly AuthService $authService
    ) {
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $token = $this->authService->login(
            $request->validated()
        );

        return response()->json([
            'user' => auth()->user(),
            'token' => $token
        ]);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->authService->register($request->validated());

        return response()->json([
            'user' => $user,
            'token' => auth()->login($user)
        ]);
    }

    public function logout(): JsonResponse
    {
        if (auth()->check()) {
            auth()->logout();
        }

        return response()->json([
            'message' => __('auth.logged_out')
        ]);
    }

    public function refresh(): JsonResponse
    {
        try {
            return response()->json([
                'token' => auth()->refresh()
            ]);
        } catch (Exception) {
            return response()->json([
                'message' => __('auth.token_not_valid')
            ], 401);
        }
    }
}