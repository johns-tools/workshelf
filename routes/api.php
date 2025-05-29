<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TimeConversionController;
use App\Http\Controllers\InterestRepaymentCalculation;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/convert-ms-to-minutes',
     [TimeConversionController::class, 'convertMsToMinutes'])
     ->middleware('throttle:heavy');

Route::get('/interest-repayment-calculation/{amount}/{months}/{interest}',
     [InterestRepaymentCalculation::class, 'calculateInterestBasedOnMonths'])
     ->middleware('throttle:heavy');
