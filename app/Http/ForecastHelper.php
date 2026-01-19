<?php

namespace App\Http;

class ForecastHelper
{
    const WEATHER_ICONS = [
        'rainy' => 'fa-cloud-rain',
        'snowy' => 'fa-snowflake',
        'sunny' => 'fa-sun',
        'cloudy' => 'fa-cloud-sun',
    ];

    public static function getIconByWeatherType(string $type): string
    {
        $icon = self::WEATHER_ICONS[$type];
        return $icon;
    }

    public static function getColorByTemperature(float $temperature): string
    {
        if ($temperature <= 0) {
            $boja = 'lightblue';
        } elseif ($temperature >= 1 && $temperature <= 15) {
            $boja = 'blue';
        } elseif ($temperature > 15 && $temperature <= 25) {
            $boja = 'green';
        } else {
            $boja = 'red';
        }

        return $boja;
    }
}
