<?php

namespace App\Http\Controllers;

use App\Services\TimeConversionService;

use Illuminate\Http\Request;

class InterestRepaymentCalculation extends Controller
{

    public function loadView()
    {
        //return view('ms_min_conversion');
    }

    public function calculateInterestBasedOnMonths($amount, $months, $interest)
    {
        return response()->json([$amount, $months, $interest]);
    }

}
