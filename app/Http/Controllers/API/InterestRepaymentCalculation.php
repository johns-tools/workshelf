<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

// Services
use App\Services\InterestCalculationService;

// Requests
use App\Http\Requests\CalculateInterestRequest;

class InterestRepaymentCalculation extends Controller
{
    // For dependency injection.
    protected InterestCalculationService $interestService;

    public function __construct(InterestCalculationService $interestService)
    {
        $this->interestService = $interestService;
    }

    public function calculateInterestBasedOnMonths(CalculateInterestRequest $request)
    {
        // Format incoming request data.
        $amount   = (int)$request->get('amount');
        $months   = (int)$request->get('months');
        $interest = (float)$request->get('interest');

        // Making use of the interestService instance.
        $calculated = $this->interestService->calculateInterest(
            $amount,
            $months,
            $interest
        );

        return response()->json(
            [
                'calculated_result' => $calculated
            ]
        );
    }
}
