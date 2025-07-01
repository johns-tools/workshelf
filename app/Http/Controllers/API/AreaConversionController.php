<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\AreaConversionService;
use App\Http\Requests\CalculateAreaRequest;
use Illuminate\Http\JsonResponse;

/**
 * Handle area conversion API requests.
 */
class AreaConversionController extends Controller
{
    /** Service used for converting area measurements. */
    private AreaConversionService $areaConversionService;

    /**
     * Inject dependencies.
     */
    public function __construct(AreaConversionService $areaConversionService)
    {
        $this->areaConversionService = $areaConversionService;
    }

    /**
     * Calculate the area in cm² and m² from the request values.
     */
    public function calculate(CalculateAreaRequest $request): JsonResponse
    {
        try {
            $result = $this->areaConversionService->calculate(
                $request->input('length_cm'),
                $request->input('width_cm')
            );

            return response()->json([
                'status' => 'success',
                'data' => $result,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 400);
        }
    }
}
