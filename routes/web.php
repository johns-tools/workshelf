<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

// Data Admin
Route::get('/', [LoginController::class, 'applicationLanding'])->name('application.landing');
// Route::get('/admin/dashboard', [LoginController::class, 'adminDashboard'])->name('admin.dashboard');
// Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

