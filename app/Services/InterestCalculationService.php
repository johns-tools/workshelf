<?php

namespace App\Services;

class InterestCalculationService
{
    public function calculateInterest($amount, $months, $interest)
    {
       $monthlyRate = ($interest / 100) / 12;
        $monthlyInterest = $amount * $monthlyRate;
        $totalInterest = $monthlyInterest * $months;
        $totalRepayment = $amount + $totalInterest;

        return [
            'principal'         => round($amount, 2),
            'annual_rate'       => round($interest, 2),
            'months'            => $months,
            'monthly_interest'  => round($monthlyInterest, 2),
            'total_interest'    => round($totalInterest, 2),
            'monthly_repayment' => round($totalRepayment / $months, 2),
            'total_repayment'   => round($totalRepayment, 2),
        ];
    }
}
