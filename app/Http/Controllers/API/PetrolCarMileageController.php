<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\PetrolCarMileageService;
use App\Http\Requests\CalculatePetrolMileageRequest;
use Illuminate\Http\JsonResponse;

class PetrolCarMileageController extends Controller
{
    private PetrolCarMileageService $petrolCarMileageService;

    public function __construct(PetrolCarMileageService $petrolCarMileageService)
    {
        $this->petrolCarMileageService = $petrolCarMileageService;
    }

    public function calculate(CalculatePetrolMileageRequest $request): JsonResponse
    {
        try {
            $result = $this->petrolCarMileageService->calculate(
                $request->input('tank_litres'),
                $request->input('cost_per_litre'),
                $request->input('range_miles'),
                $request->input('mpg')
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
