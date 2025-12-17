<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cities;            
use App\Models\ForecastsModel;    
use Carbon\Carbon;

class ForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = Cities::all(); // svi gradovi

        foreach ($cities as $city) {

            for ($i = 0; $i < 5; $i++) {

                ForecastsModel::create([
                    "city_id" => $city->id,

                    // RANDOM TEMPERATURA 15–30
                    "temperature" => rand(15, 30),

                    // RANDOM DATUM: danas + 1–30 dana
                    "forecast_date" => Carbon::now()->addDays(rand(1, 30)),
                ]);
            }
        }
    }
}
