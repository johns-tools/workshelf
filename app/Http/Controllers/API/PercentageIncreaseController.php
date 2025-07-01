<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\PercentageIncreaseService;
use App\Http\Requests\CalculatePercentageIncreaseRequest;
use Illuminate\Http\JsonResponse;

/**
 * Calculate percentage increases.
 */
class PercentageIncreaseController extends Controller
{
    /** Service that performs percentage calculations. */
    private PercentageIncreaseService $percentageIncreaseService;

    /**
     * Inject the percentage increase service.
     */
    public function __construct(PercentageIncreaseService $percentageIncreaseService)
    {
        $this->percentageIncreaseService = $percentageIncreaseService;
    }

    /**
     * Calculate the percentage increase between two values.
     */
    public function calculate(CalculatePercentageIncreaseRequest $request): JsonResponse
    {
        try {
            $result = $this->percentageIncreaseService->calculate(
                $request->input('initial_value'),
                $request->input('final_value')
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
