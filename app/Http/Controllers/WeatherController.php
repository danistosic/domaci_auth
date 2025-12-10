<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Weather; // naš model za tablicu "weather"

class WeatherController extends Controller
{
    public function index()
    {
        // 1. Dohvati sve redove iz tablice "weather"
        $zapisi = Weather::all();

        // 2. Pretvori ih u asocijativni array [grad => temperatura]
        $prognoza = [];

        foreach ($zapisi as $zapis) {
            $prognoza[$zapis->city] = $zapis->temperature;
        }

        // 3. Pošalji u view isto kao prije
        return view('weather', compact('prognoza'));
    }
}



