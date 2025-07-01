<?php

use App\Services\TimeConversionService;

it('converts milliseconds to minutes', function () {
    $service = new TimeConversionService();
    expect($service->msToMinutes(120000))->toBe(2.0);
});

it('returns json representation', function () {
    $service = new TimeConversionService();
    $json = $service->asJson(30000);
    expect($json)->toMatchArray(['ms_as_minutes' => '0.50']);
});
