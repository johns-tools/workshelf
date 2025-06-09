<?php

namespace App\Services;

class PetrolCarMileageService
{
    /**
     * Calculate the fuel cost and cost per mile for a petrol vehicle.
     *
     * If $rangeMiles is not provided, it will be calculated using $tankLitres and $mpg.
     *
     * @param float      $tankLitres    Tank capacity in litres
     * @param float      $costPerLitre  Cost of fuel per litre
     * @param float|null $rangeMiles    Optional: Range on a full tank in miles
     * @param float|null $mpg           Optional: Miles per gallon (UK)
     *
     * @return array
     */
    public function calculate(float $tankLitres, float $costPerLitre, float $rangeMiles = null, float $mpg = null): array
    {
        if ($tankLitres <= 0 || $costPerLitre <= 0) {
            throw new \InvalidArgumentException('Tank size and fuel cost must be greater than zero.');
        }

        if (is_null($rangeMiles)) {
            if (is_null($mpg) || $mpg <= 0) {
                throw new \InvalidArgumentException('Either rangeMiles or a valid mpg value must be provided.');
            }

            // Convert litres to UK gallons and calculate range
            $ukGallons = $tankLitres / 4.54609;
            $rangeMiles = $ukGallons * $mpg;
        }

        $fullTankCost = $tankLitres * $costPerLitre;
        $costPerMile = $fullTankCost / $rangeMiles;

        return [
            'tank_litres' => $tankLitres,
            'cost_per_litre' => round($costPerLitre, 4),
            'range_miles' => round($rangeMiles, 2),
            'full_tank_cost' => round($fullTankCost, 2),
            'cost_per_mile' => round($costPerMile, 4),
            'cost_per_mile_pence' => round($costPerMile * 100, 2),
        ];
    }
}
