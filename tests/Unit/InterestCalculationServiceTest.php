<?php

use App\Services\InterestCalculationService;

it('calculates loan interest correctly', function () {
    $service = new InterestCalculationService();

    $result = $service->calculateInterest(1000, 12, 6);

    expect($result)->toMatchArray([
        'principal' => 1000.0,
        'annual_rate' => 6.0,
        'months' => 12,
        'monthly_interest' => 5.0,
        'total_interest' => 60.0,
        'monthly_repayment' => 88.33,
        'total_repayment' => 1060.0,
    ]);
});
