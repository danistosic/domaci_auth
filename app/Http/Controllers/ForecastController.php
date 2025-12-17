<?php

namespace App\Http\Controllers;

use App\Models\Weather;

class ForecastController extends Controller
{
    public function index($city)
    {
        // 1) Normalizacija - pretvaranje u mala slova
        $city = strtolower($city);

        // 2) Pronađi grad u bazi
        $weather = Weather::where('city', $city)->first();

        // 3) Ako grad ne postoji – error poruka
        if (!$weather) {
            return "Grad '{$city}' ne postoji u weather tablici!";
        }

        // 4) Kreiranje prognoze za narednih 5 dana (random vrijednosti)
        $forecast = [
            rand(20, 30),
            rand(20, 30),
            rand(20, 30),
            rand(20, 30),
            rand(20, 30),
        ];

        // 5) Ispis korisniku
        return "Prognoza za {$city}: " . implode(', ', $forecast);
    }
}


