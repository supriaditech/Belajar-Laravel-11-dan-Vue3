<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    // Rute untuk v1/auth  
    Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
        Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
        Route::post('/user', [AuthController::class, 'getUser'])->middleware('auth:sanctum');
        Route::post('/update-user', [AuthController::class, 'updateUser'])->middleware('auth:sanctum');
        Route::post('/delete-account', [AuthController::class, 'deleteUser'])->middleware('auth:sanctum');
    });
});
