<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JwtAuthController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ClientApiController;

// Obtener token
Route::post('/auth/login', [JwtAuthController::class, 'login']);

// Rutas protegidas por JWT
Route::middleware('jwt.auth')->group(function () {
    // Perfil + gestión de token
    Route::get('/auth/me',       [JwtAuthController::class, 'me']);
    Route::post('/auth/logout',  [JwtAuthController::class, 'logout']);
    Route::post('/auth/refresh', [JwtAuthController::class, 'refresh']);
    Route::middleware(['jwt.auth','can:admin-only'])->group(function () {
    Route::apiResource('users', \App\Http\Controllers\Api\UserApiController::class);
    });


    // CRUDs
    Route::apiResource('users',    UserApiController::class);
    Route::apiResource('products', ProductApiController::class);
    Route::apiResource('clients',  ClientApiController::class);
});
