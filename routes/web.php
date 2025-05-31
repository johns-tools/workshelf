<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\PythonController;
// use App\Http\Controllers\LoginController;

//use App\Http\Controllers\TimeConversionController;
//use App\Http\Controllers\InterestRepaymentCalculation;
use App\Http\Controllers\OneHundredApisController;


// # View #
Route::get('/one-hundred-apis', [OneHundredApisController::class, 'home'])->middleware('throttle:heavy');

// # API end-points, to be moved to API #
// Route::get('/convert-ms-to-minutes',
//      [TimeConversionController::class, 'convertMsToMinutes'])
//      ->middleware('throttle:heavy');

// Route::get('/interest-repayment-calculation/{amount}/{months}/{interest}',
//      [InterestRepaymentCalculation::class, 'calculateInterestBasedOnMonths'])
//      ->middleware('throttle:heavy');

// Route::get('/python-run', [PythonController::class, 'run']);
// Data Admin
// Route::get('/', [LoginController::class, 'applicationLanding'])->name('application.landing');
// Route::get('/admin/dashboard', [LoginController::class, 'adminDashboard'])->name('admin.dashboard');
// Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');
