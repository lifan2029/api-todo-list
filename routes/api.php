<?php

use App\Http\Controllers\Api\V1\AuthController;

Route::group(['middleware' => 'api', 'prefix' => 'v1'], function () {

    Route::controller(AuthController::class)->prefix('auth')->group(function () {
        Route::post('login', 'login');
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });
});