<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use App\Models\ForecastsModel;

class ForecastController extends Controller
{
    public function index($city)
    {
        // pretvaranje u mala slova
        $city = strtolower($city);

        // pronalazak grada po imenu (case-insensitive)
        $grad = Cities::whereRaw('LOWER(name) = ?', [$city])->first();

        if (!$grad) {
            return "Grad '{$city}' ne postoji u bazi.";
        }

        // dohvat prognoze za taj grad
        $prognoze = ForecastsModel::where('city_id', $grad->id)->get();

        // vrati view forecasts.blade.php
        return view('forecasts', compact('prognoze'));
    }
}
