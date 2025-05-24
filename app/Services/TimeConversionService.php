<?php

namespace App\Services;

// Services
use App\Services\PythonRunner;

class TimeConversionService
{
    public static function convertMsToMinutes($msValue)
    {
        return app(PythonRunner::class)->run('millisecondsConverter.py', [
            'ms_value' => $msValue
        ]);
    }
}
