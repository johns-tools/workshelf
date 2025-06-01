<?php

namespace App\Http\Controllers;

use App\Services\TimeConversionService;
use App\Http\Requests\ConvertMsToMinutesRequest;
use Illuminate\Http\Request;

class TimeConversionController extends Controller
{

    public function loadView()
    {
        return view('ms_min_conversion');
    }

    public function convertMsToMinutes(ConvertMsToMinutesRequest $request)
    {
        $msValue = (int)$request->get('ms_value'); // Get from request value.
        $minutes = TimeConversionService::convertMsToMinutes($msValue);
        // Convert raw mins value to a shorter decimal version.
        $minutes['ms_as_minutes'] = number_format($minutes['ms_as_minutes'], 3);

        return response()->json($minutes);
    }
}
