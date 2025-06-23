<?php

use App\Services\PercentageIncreaseService;

it('compounds monthly without additional amount', function () {
    $service = new PercentageIncreaseService();
    $result = $service->compound(100, 2, 10);

    expect($result)->toBeCloseTo(121.0, 2);
});

it('compounds monthly with additional amount', function () {
    $service = new PercentageIncreaseService();
    $result = $service->compound(100, 2, 10, 25);

    expect($result)->toBeCloseTo(173.5, 2);
});
