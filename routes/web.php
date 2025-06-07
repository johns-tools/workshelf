<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OneHundredApisController;
use App\Http\Controllers\BlogController;

// # View
Route::get('/cv', function(){
    return view('cv');
});
Route::get('/', [OneHundredApisController::class, 'home'])->middleware('throttle:heavy');
Route::get('/one-hundred-apis', [OneHundredApisController::class, 'home'])->middleware('throttle:heavy');
Route::get('/blog', [BlogController::class, 'index'])->middleware('throttle:heavy');

// Route::get('/petrol-mileage', function () {
//     return view('petrol_mileage');
// })->middleware('throttle:heavy');
