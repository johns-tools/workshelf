<?php

namespace App\Services;

class AreaConversionService
{
    public function calculate(float $lengthCm, float $widthCm): array
    {
        if ($lengthCm <= 0 || $widthCm <= 0) {
            throw new \InvalidArgumentException('Length and width must be greater than zero.');
        }

        $areaCm2 = $lengthCm * $widthCm;
        $areaM2 = $areaCm2 / 10000;

        return [
            'length_cm' => $lengthCm,
            'width_cm' => $widthCm,
            'area_cm2' => round($areaCm2, 2),
            'area_m2' => round($areaM2, 4),
        ];
    }
}
