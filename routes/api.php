<?php

use App\Modules\Tasks\Controllers\TaskController;
use App\Modules\Users\Controllers\MeController;
use App\Modules\Users\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth:sanctum'], function () {
    /*
    |--------------------------------------------------------------------------
    | Users
    |--------------------------------------------------------------------------
    */
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('me', MeController::class)->name('me');
    });
    Route::apiResource('users', UserController::class)->only('update', 'destroy');

    /*
    |--------------------------------------------------------------------------
    | Tasks
    |--------------------------------------------------------------------------
    */
    Route::apiResource('tasks', TaskController::class);
});
