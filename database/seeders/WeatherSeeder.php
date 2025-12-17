<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cities;
use App\Models\Weather;

class WeatherSeeder extends Seeder
{
    public function run(): void
    {
        $cities = Cities::all();

        foreach ($cities as $city) {

            // Provjeri postoji li već weather za taj grad
            $existing = Weather::where('city_id', $city->id)->first();

            if ($existing !== null) {
                $this->command->getOutput()->error("Grad {$city->name} već ima weather zapis!");
                continue;
            }

            // Ako ne postoji, kreiraj novi
            Weather::create([
                'city_id' => $city->id,
                'temperature' => rand(15, 30),
            ]);
        }
    }
}
