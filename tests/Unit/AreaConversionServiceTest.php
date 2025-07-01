<?php

use App\Services\AreaConversionService;

it('calculates area correctly', function () {
    $service = new AreaConversionService();

    $result = $service->calculate(25, 50);

    expect($result)->toMatchArray([
        'length_cm' => 25.0,
        'width_cm'  => 50.0,
        'area_cm2'  => 1250.0,
        'area_m2'   => 0.125,
    ]);
});

it('throws when values are not positive', function () {
    $service = new AreaConversionService();

    expect(fn() => $service->calculate(0, 10))->toThrow(InvalidArgumentException::class);
});
