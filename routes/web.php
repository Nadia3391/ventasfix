<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\DashboardController;

// Home -> redirige al panel
Route::get('/', fn () => redirect()->route('dashboard'));

// Rutas protegidas por login
Route::middleware(['auth'])->group(function () {
    // Dashboard (usa tu layout del template)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', \App\Http\Controllers\Web\UserController::class);
    Route::resource('products', \App\Http\Controllers\Web\ProductController::class);
    Route::resource('clients', \App\Http\Controllers\Web\ClientController::class);
    Route::middleware(['auth','can:admin-only'])->group(function () {
    Route::resource('users', \App\Http\Controllers\Web\UserController::class);
    });

    

    // Perfil (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
