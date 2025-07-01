<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\ElectricCarMileageService;
use App\Http\Requests\CalculateEvMileageRequest;
use Illuminate\Http\JsonResponse;

/**
 * Expose EV mileage calculations over the API.
 */
class ElectricCarMileageController extends Controller
{
    /** @var ElectricCarMileageService */
    private $electricCarMileageService;

    /**
     * Inject the electric car mileage service.
     */
    public function __construct(ElectricCarMileageService $electricCarMileageService)
    {
        $this->electricCarMileageService = $electricCarMileageService;
    }

    /**
     * Calculate EV charge cost and cost per mile.
     *
     * @param CalculateEvMileageRequest $request
     * @return JsonResponse
     */
    public function calculate(CalculateEvMileageRequest $request): JsonResponse
    {
        try {
            $result = $this->electricCarMileageService->calculate(
                $request->input('battery_kwh'),
                $request->input('cost_per_kwh'),
                $request->input('range_miles')
            );

            return response()->json([
                'status' => 'success',
                'data' => $result
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
