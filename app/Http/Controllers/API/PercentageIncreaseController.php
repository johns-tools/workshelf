<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\PercentageIncreaseService;
use App\Http\Requests\CalculatePercentageIncreaseRequest;
use Illuminate\Http\JsonResponse;

class PercentageIncreaseController extends Controller
{
    private PercentageIncreaseService $percentageIncreaseService;

    public function __construct(PercentageIncreaseService $percentageIncreaseService)
    {
        $this->percentageIncreaseService = $percentageIncreaseService;
    }

    public function calculate(CalculatePercentageIncreaseRequest $request): JsonResponse
    {
        try {

            $result = $this->percentageIncreaseService->compound(
                $request->input('principal'),
                $request->input('months'),
                $request->input('rate'),
                $request->input('monthly_addition'),
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
