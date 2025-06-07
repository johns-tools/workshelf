<?php

namespace App\Services;

use Carbon\CarbonInterval;

class TimeConversionService
{
    /**
     * Convert milliseconds to minutes using plain math.
     *
     * @param  int|float  $ms
     * @return float
     */
    public function msToMinutes(float|int $ms): float
    {
        // 1 minute = 60 000 milliseconds
        return $ms / 60_000;
    }

    /**
     * Convert milliseconds to minutes using CarbonInterval.
     *
     * @param  int|float  $ms
     * @return float
     */
    public function msToMinutesWithCarbon(float|int $ms): float
    {
        // First convert ms to seconds
        $seconds = $ms / 1_000;

        // Build a CarbonInterval of that many seconds
        $interval = CarbonInterval::seconds($seconds);

        // totalSeconds() returns a float of the entire interval in seconds
        // divide by 60 to get minutes (may include fractions)
        return $interval->totalSeconds() / 60;
    }

    /**
     * Return a JSON-serializable array like your Python script did.
     *
     * @param  int|float  $ms
     * @return array{ms_as_minutes: float}
     */
    public function asJson(float|int $ms): array
    {
        return [
            'ms_as_minutes' => $this->msToMinutes($ms),
        ];
    }

}
