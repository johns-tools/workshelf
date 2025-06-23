<?php

namespace App\Services;

class PercentageIncreaseService
{
    /**
     * Calculate compounded growth with an optional additional amount applied
     * after each month's interest.
     */
    public function compound(
        float $initialAmount,
        int $months,
        float $monthlyPercent,
        float $additionalPerMonth = 0
    ): float {
        if ($initialAmount < 0 || $months < 0) {
            throw new \InvalidArgumentException('Initial amount and months must be non-negative.');
        }

        $amount = $initialAmount;
        $rate = $monthlyPercent / 100;

        for ($i = 0; $i < $months; $i++) {
            $amount *= (1 + $rate);
            $amount += $additionalPerMonth;
        }

        return round($amount, 2);
    }
}
