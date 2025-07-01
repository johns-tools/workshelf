<?php

namespace App\Http\Controllers\API;

// Services
use App\Services\TimeConversionService;

// Framework
use App\Http\Controllers\Controller;
use App\Http\Requests\ConvertMsToMinutesRequest;

/**
 * Convert milliseconds to other time units via API endpoints.
 */
class TimeConversionController extends Controller
{
    /** Service handling time conversions. */
    protected TimeConversionService $timeConversionService;

    /**
     * Inject the time conversion service.
     */
    public function __construct(TimeConversionService $timeConversionService)
    {
        $this->timeConversionService = $timeConversionService;
    }

    /**
     * Display a basic view with an input field for conversions.
     */
    public function loadView()
    {
        return view('ms_min_conversion');
    }

    /**
     * Convert milliseconds from the request to minutes.
     */
    public function convertMsToMinutes(ConvertMsToMinutesRequest $request)
    {
        $msValue = (int)$request->get('ms_value'); // Get from request value.

        return response()->json(
            $this->timeConversionService->asJson($msValue)
        );
    }

}
