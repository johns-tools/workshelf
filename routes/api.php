<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TimeConversionController;
use App\Http\Controllers\API\InterestRepaymentCalculation;
use App\Http\Controllers\API\ElectricCarMileageController;
use App\Http\Controllers\API\PetrolCarMileageController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/convert-ms-to-minutes',
     [TimeConversionController::class, 'convertMsToMinutes'])
     ->middleware('throttle:heavy');

Route::get('/interest-repayment-calculation',
     [InterestRepaymentCalculation::class, 'calculateInterestBasedOnMonths'])
     ->middleware('throttle:heavy');

Route::post('/calculate-ev-mileage',
     [ElectricCarMileageController::class, 'calculate'])
     ->middleware('throttle:heavy');

Route::post('/calculate-petrol-mileage',
     [PetrolCarMileageController::class, 'calculate'])
     ->middleware('throttle:heavy');
