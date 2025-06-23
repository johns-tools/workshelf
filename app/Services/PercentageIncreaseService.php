<?php

namespace App\Services;

class PercentageIncreaseService
{
    /**
     * Calculate compound growth with optional monthly additions.
     */
    public function calculate(float $principal,
                              float $rate,
                              int $months,
                              float $monthlyAddition = 0): array
    {
        if ($principal <= 0 || $rate <= 0 || $months <= 0 || $monthlyAddition < 0) {
            throw new \InvalidArgumentException('All values must be positive and monthly addition cannot be negative.');
        }

        $monthlyRate = $rate / 100 / 12;
        $amount = $principal;
        $totalInterest = 0;

        for ($i = 0; $i < $months; $i++) {
            $interest = $amount * $monthlyRate;
            $amount += $interest + $monthlyAddition;
            $totalInterest += $interest;
        }

        return [
            'final_amount' => round($amount, 2),
            'total_interest' => round($totalInterest, 2),
        ];
    }
}
