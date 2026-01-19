<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cities;
use App\Models\ForecastsModel;
use Carbon\Carbon;

class ForecastsSeeder extends Seeder
{
    public function run(): void
    {
        // Obriši sve postojeće podatke
        ForecastsModel::truncate();

        // Dohvati sve gradove
        $cities = Cities::all();

        foreach ($cities as $city) {
            $lastTemperature = null;

            for ($i = 0; $i < 5; $i++) {

                // Random weather tip
                $weatherType = ForecastsModel::WEATHERS[rand(0, 3)];

                // Po defaultu null
                $probability = null;

                // Ako je kiša ili snijeg -> generiraj postotak
                if ($weatherType === 'rainy' || $weatherType === 'snowy') {
                    $probability = rand(1, 100);
                }

                $temperature = null;

                if ($lastTemperature !== null) {
                    $minTemperature = $lastTemperature - 5;
                    $maxTemperature = $lastTemperature + 5;
                    $temperature = rand($minTemperature, $maxTemperature);
                } else {
                    switch ($weatherType) {
                        case 'sunny':
                            $temperature = rand(-50, 50);
                            break;
                        case 'cloudy':
                            $temperature = rand(-50, 15);
                            break;
                        case 'rainy':
                            $temperature = rand(-10, 50);
                            break;
                        case 'snowy':
                            $temperature = rand(-50, 1);
                            break;
                    }
                }

                ForecastsModel::create([
                    'city_id'       => $city->id,
                    'temperature'   => $temperature,
                    'forecast_date' => Carbon::now()->addDays(rand(1, 30)),
                    'weather_type'  => $weatherType,
                    'probability'   => $probability,
                ]);

                $lastTemperature = $temperature;
            }
        }
    }
}
