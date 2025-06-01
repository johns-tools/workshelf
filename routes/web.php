<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OneHundredApisController;

// # View #
Route::get('/one-hundred-apis', [OneHundredApisController::class, 'home'])->middleware('throttle:heavy');