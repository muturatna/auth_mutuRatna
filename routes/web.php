<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route Login dan Register (tanpa middleware)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Route yang hanya boleh diakses user yang login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
