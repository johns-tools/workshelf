<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PythonController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TimeConversionController;

Route::get('/convert-ms-to-minutes-view', [TimeConversionController::class, 'loadView']);
Route::get('/convert-ms-to-minutes', [TimeConversionController::class, 'convertMsToMinutes']);

// Route::get('/python-run', [PythonController::class, 'run']);
// Data Admin
// Route::get('/', [LoginController::class, 'applicationLanding'])->name('application.landing');
// Route::get('/admin/dashboard', [LoginController::class, 'adminDashboard'])->name('admin.dashboard');
// Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
