<?php

use App\Services\PercentageIncreaseService;

it('compounds with monthly percent and additional amount', function () {
    $service = new PercentageIncreaseService();

    $result = $service->compound(100, 3, 10, 5);

    expect($result)->toBeCloseTo(149.65, 2);
});

it('throws when initial amount is negative', function () {
    $service = new PercentageIncreaseService();

    expect(fn() => $service->compound(-1, 1, 10))
        ->toThrow(InvalidArgumentException::class);
});
