<?php

namespace App\Services;

class PetrolCarMileageService
{
    /**
     * Calculate the fuel cost and cost per mile for a petrol vehicle.
     *
     * @param float $tankLitres   Tank capacity in litres
     * @param float $costPerLitre Cost of fuel per litre
     * @param float $rangeMiles   Range on a full tank in miles
     *
     * @return array
     */
    public function calculate(float $tankLitres, float $costPerLitre, float $rangeMiles): array
    {
        if ($tankLitres <= 0 || $costPerLitre <= 0 || $rangeMiles <= 0) {
            throw new \InvalidArgumentException('All values must be greater than zero.');
        }

        $fullTankCost = $tankLitres * $costPerLitre;
        $costPerMile = $fullTankCost / $rangeMiles;

        return [
            'tank_litres' => $tankLitres,
            'cost_per_litre' => round($costPerLitre, 4),
            'range_miles' => $rangeMiles,
            'full_tank_cost' => round($fullTankCost, 2),
            'cost_per_mile' => round($costPerMile, 4),
            'cost_per_mile_pence' => round($costPerMile * 100, 2),
        ];
    }
}
