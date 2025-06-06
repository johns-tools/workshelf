<?php

namespace App\Services;

class ElectricCarMileageService
{
    /**
     * Calculate the EV charge cost and cost per mile.
     *
     * @param float $batteryKwh      Battery capacity in kilowatt-hours (kWh)
     * @param float $costPerKwh      Cost of electricity per kWh (e.g., 0.07 for 7p)
     * @param float $rangeMiles      Car range on full charge in miles
     *
     * @return array
     */
    public function calculate(float $batteryKwh,
                              float $costPerKwh,
                              float $rangeMiles): array
    {
        if ($batteryKwh <= 0 || $costPerKwh <= 0 || $rangeMiles <= 0) {
            throw new \InvalidArgumentException("All values must be greater than zero.");
        }

        $fullChargeCost = $batteryKwh * $costPerKwh;
        $costPerMile = $fullChargeCost / $rangeMiles;

        return [
            'battery_kwh' => $batteryKwh,
            'cost_per_kwh' => round($costPerKwh, 4),
            'range_miles' => $rangeMiles,
            'full_charge_cost' => round($fullChargeCost, 2),
            'cost_per_mile' => round($costPerMile, 4),
            'cost_per_mile_pence' => round($costPerMile * 100, 2), // in pence
        ];
    }
}
