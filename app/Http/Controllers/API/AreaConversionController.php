<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\AreaConversionService;
use App\Http\Requests\CalculateAreaRequest;
use Illuminate\Http\JsonResponse;

class AreaConversionController extends Controller
{
    private AreaConversionService $areaConversionService;

    public function __construct(AreaConversionService $areaConversionService)
    {
        $this->areaConversionService = $areaConversionService;
    }

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
