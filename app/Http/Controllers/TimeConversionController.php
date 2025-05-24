<?php

namespace App\Http\Controllers;

use App\Services\TimeConversionService;

use Illuminate\Http\Request;

class TimeConversionController extends Controller
{
    public function convertMsToMinutes(Request $request)
    {
        $msValue = (int)$request->get('ms_value'); // Get from request value.
        $minutes = TimeConversionService::convertMsToMinutes($msValue);
        // Convert raw mins value to a shorter decimal version.
        $minutes['ms_as_minutes'] = number_format($minutes['ms_as_minutes'], 3);

        return response()->json($minutes);

        // Need to handle JSON response for errors here.

    }
}
