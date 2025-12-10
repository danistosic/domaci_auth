<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Weather; // koristimo naš model

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Naša "prognoza" koju ćemo ubaciti u bazu
        $prognoza = [
            'Beograd'   => 22,
            'Novi Sad'  => 23,
            'Sarajevo'  => 24,
            'Zagreb'    => 26,
        ];

        foreach ($prognoza as $city => $temperature) {
            Weather::create([
                'city'        => $city,
                'temperature' => $temperature,
            ]);
        }
    }
}

