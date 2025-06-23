<?php

use App\Services\PercentageIncreaseService;

it('calculates compound growth without additions', function () {
    $service = new PercentageIncreaseService();
    $result = $service->calculate(1000, 12, 12);

    expect($result['final_amount'])->toBeCloseTo(1126.83, 2)
        ->and($result['total_interest'])->toBeCloseTo(126.83, 2);
});

it('calculates compound growth with monthly additions', function () {
    $service = new PercentageIncreaseService();
    $result = $service->calculate(100, 12, 12, 10);

    expect($result['final_amount'])->toBeCloseTo(239.51, 2)
        ->and($result['total_interest'])->toBeCloseTo(19.51, 2);
});

it('throws an exception for invalid values', function () {
    $service = new PercentageIncreaseService();

    expect(fn() => $service->calculate(0, 5, 12))->toThrow(InvalidArgumentException::class);
    expect(fn() => $service->calculate(100, -1, 12))->toThrow(InvalidArgumentException::class);
    expect(fn() => $service->calculate(100, 5, 0))->toThrow(InvalidArgumentException::class);
    expect(fn() => $service->calculate(100, 5, 12, -1))->toThrow(InvalidArgumentException::class);
});
