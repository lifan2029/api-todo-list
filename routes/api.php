<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\PriorityController;
use App\Http\Controllers\Api\V1\TaskController;

Route::group(['middleware' => 'api', 'prefix' => 'v1'], function () {

    Route::controller(AuthController::class)->prefix('auth')->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });

    Route::controller(TaskController::class)->prefix('task')->group(function () {
        Route::middleware(['auth:api'])->group(function () {
            Route::get('/', 'getAll');
            Route::post('/store', 'store');
            Route::put('/update/{task}', 'update');
            Route::put('/complete/{task}', 'complete');
            Route::delete('/delete/{task}', 'delete');
        });
    });

    Route::controller(PriorityController::class)->prefix('priority')->group(function () {
        Route::get('/', 'getAll')->middleware('auth:api');
    });
});