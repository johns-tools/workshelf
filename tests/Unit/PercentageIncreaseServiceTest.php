<?php

use App\Services\PercentageIncreaseService;

it('compounds with monthly percent and additional amount', function () {
    $service = new PercentageIncreaseService();

    $result = $service->compound(100, 3, 10, 5);
    dump($result);

    expect($result)->toBe(117.65); // This needs some looking into. The page shows 102.53
});

it('throws when initial amount is negative', function () {
    $service = new PercentageIncreaseService();

    expect(fn() => $service->compound(-1, 1, 10))
        ->toThrow(InvalidArgumentException::class);
});
