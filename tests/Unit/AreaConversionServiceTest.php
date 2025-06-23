<?php

use App\Services\AreaConversionService;

it('calculates area correctly', function () {
    $service = new AreaConversionService();

    $result = $service->calculate(200, 300);

    expect($result['area_cm2'])->toBe(60000.0)
        ->and($result['area_m2'])->toBeCloseTo(6.0, 4);
});
