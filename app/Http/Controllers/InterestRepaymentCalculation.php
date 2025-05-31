<?php

namespace App\Http\Controllers;

// Services
use App\Services\InterestCalculationService;

// Framework
use Illuminate\Http\Request;

class InterestRepaymentCalculation extends Controller
{
    // For dependency injection.
    protected InterestCalculationService $interestService;

    public function __construct(InterestCalculationService $interestService)
    {
        $this->interestService = $interestService;
    }

    public function calculateInterestBasedOnMonths(Request $request) // need to validate $amount, $months, $interest
    {
        // A required value check, internal.
        if($message = $this->checkForRequiredValues($request))
        {
            return response()->json($this->constructErrorMessage($message), 500);
        }

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

    // I wonder if it could be a good idea to push these into the service.
    private function checkForRequiredValues($request)
    {

        $message = "";

        if(!$request->get('amount'))
        {
            $message = "required: missing amount value";
        }

        if(!$request->get('months'))
        {
            $message = "required: missing months value";
        }

        if(!$request->get('interest'))
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
