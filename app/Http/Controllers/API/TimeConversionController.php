<?php

namespace App\Http\Controllers\API;

// Services
use App\Services\TimeConversionService;

// Framework
use App\Http\Controllers\Controller;
use App\Http\Requests\ConvertMsToMinutesRequest;

class TimeConversionController extends Controller
{
    protected TimeConversionService $timeConversionService;

    public function __construct(TimeConversionService $timeConversionService)
    {
        $this->timeConversionService = $timeConversionService;
    }

    public function loadView()
    {
        return view('ms_min_conversion');
    }

    public function convertMsToMinutes(ConvertMsToMinutesRequest $request)
    {
        $msValue = (int)$request->get('ms_value'); // Get from request value.

        return response()->json(
            $this->timeConversionService->asJson($msValue)
        );
    }

}
