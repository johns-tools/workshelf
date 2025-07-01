<?php

use App\Services\PetrolCarMileageService;

it('calculates cost per mile when range given', function () {
    $service = new PetrolCarMileageService();

    $result = $service->calculate(50, 1.2, 400);

    expect($result)->toMatchArray([
        'tank_litres' => 50.0,
        'cost_per_litre' => 1.2,
        'range_miles' => 400.0,
        'full_tank_cost' => 60.0,
        'cost_per_mile' => 0.15,
        'cost_per_mile_pence' => 15.0,
    ]);
});

it('calculates using mpg when range not provided', function () {
    $service = new PetrolCarMileageService();

    $result = $service->calculate(50, 1.2, null, 40);

    // Range should be approx 440.04 miles
    expect($result['range_miles'])->toBeCloseTo(440.04, 2);
    expect($result['full_tank_cost'])->toBe(60.0);
});

it('throws for invalid tank size', function () {
    $service = new PetrolCarMileageService();

    expect(fn() => $service->calculate(0, 1.0, 100))
        ->toThrow(InvalidArgumentException::class);
});
