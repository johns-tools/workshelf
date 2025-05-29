<?php

namespace App\Http\Controllers;

// Services
use App\Services\InterestCalculationService;

class InterestRepaymentCalculation extends Controller
{
    // For dependency injection.
    protected InterestCalculationService $interestService;

    public function __construct(InterestCalculationService $interestService)
    {
        $this->interestService = $interestService;
    }

    public function calculateInterestBasedOnMonths($amount, $months, $interest)
    {
        // A required value check, internal.
        if($message = $this->checkForRequiredValues($amount, $months, $interest))
        {
            return response()->json($this->constructErrorMessage($message), 500);
        }

        // Making use of the interestService instance.
        $calculated = $this->interestService->calculateInterest($amount, $months, $interest);

        return response()->json(
            [
                'calculated_result' => $calculated
            ]
        );

    }

    // I wonder if it could be a good idea to push these into the service.
    private function checkForRequiredValues($amount, $months, $interest)
    {
        $message = "";

        if(!$amount)
        {
            $message = "required: missing amount value";
        }

        if(!$months)
        {
            $message = "required: missing months value";
        }

        if(!$interest)
        {
            $message = "required: missing interest value";
        }

        if($message)
        {
            return $message;
        }

    }

    // Simple error message generator, for one place to adjust.
    private function constructErrorMessage($message)
    {
        return ['message' => $message];
    }

}
