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

        $monthlyBreakdown = [];

        for ($i = 1; $i <= $months; $i++) {
            $monthlyBreakdown[] = [
                'month' => $i,
                'interest' => round($monthlyInterest, 2),
                'total_due' => round($amount + $monthlyInterest * $i, 2),
            ];
        }

        return [
            'principal'        => round($amount, 2),
            'annual_rate'      => round($interest, 2),
            'monthly_rate'     => round($monthlyRate * 100, 2),
            'months'           => $months,
            'monthly_interest' => round($monthlyInterest, 2),
            'total_interest'   => round($totalInterest, 2),
            'total_repayment'  => round($totalRepayment, 2),
            'breakdown'        => $monthlyBreakdown,
        ];
    }
}
