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

            for ($i = 0; $i < 5; $i++) {

                // Random weather tip
                $weatherType = ForecastsModel::WEATHERS[rand(0, 2)];

                // Po defaultu null
                $probability = null;

                // Ako je kiša ili snijeg -> generiraj postotak
                if ($weatherType === 'rainy' || $weatherType === 'snowy') {
                    $probability = rand(1, 100);
                }

                ForecastsModel::create([
                    'city_id'       => $city->id,
                    'temperature'   => rand(15, 30),
                    'forecast_date' => Carbon::now()->addDays(rand(1, 30)),
                    'weather_type'  => $weatherType,
                    'probability'   => $probability,
                ]);
            }
        }
    }
}
