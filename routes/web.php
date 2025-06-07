<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OneHundredApisController;

// # View #
Route::get('/', [OneHundredApisController::class, 'home'])->middleware('throttle:heavy');
Route::get('/one-hundred-apis', [OneHundredApisController::class, 'home'])->middleware('throttle:heavy');

// Route::get('/petrol-mileage', function () {
//     return view('petrol_mileage');
// })->middleware('throttle:heavy');
