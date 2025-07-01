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
        float $annualPercent,
        float $additionalPerMonth = 0
    ): float {
        if ($initialAmount < 0 || $months < 0) {
            throw new \InvalidArgumentException('Initial amount and months must be non-negative.');
        }

        $amount = $initialAmount;
        $monthlyRate = $annualPercent / 12 / 100;

        for ($i = 0; $i < $months; $i++)
        {
            $amount *= (1 + $monthlyRate);
            $amount += $additionalPerMonth;
        }

        dump(number_format($amount, 2));

        return number_format($amount, 2);
    }
}
