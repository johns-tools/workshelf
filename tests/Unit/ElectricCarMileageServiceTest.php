<?php

use App\Services\ElectricCarMileageService;

it('calculates electric car costs correctly', function () {
    $service = new ElectricCarMileageService();

    $result = $service->calculate(60, 0.07, 200);

    expect($result)->toMatchArray([
        'battery_kwh' => 60.0,
        'cost_per_kwh' => 0.07,
        'range_miles' => 200.0,
        'full_charge_cost' => 4.2,
        'cost_per_mile' => 0.021,
        'cost_per_mile_pence' => 2.1,
    ]);
});

it('throws when values are not positive', function () {
    $service = new ElectricCarMileageService();

    expect(fn() => $service->calculate(0, 0.07, 200))
        ->toThrow(InvalidArgumentException::class);
});
