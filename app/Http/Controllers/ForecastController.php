<?php

namespace App\Http\Controllers;

use App\Models\Cities;
use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function search(Request $request)
    {
        $cityName = $request->get('city');
        $cities = Cities::with('todaysForecast')
            ->where('name', 'LIKE', "%{$cityName}%")
            ->get();

        if (count($cities) === 0) {
            return redirect('/')
                ->with('error', 'Nismo pronasli gradove koji su za vase kriterijume');
        }

        return view('search_results', compact('cities'));
    }

    public function index($city)
    {
        // pretvaranje u mala slova
        $city = strtolower($city);

        // pronalazak grada po imenu (case-insensitive)
        $grad = Cities::with('forecasts')
            ->whereRaw('LOWER(name) = ?', [$city])
            ->first();

        if (!$grad) {
            return "Grad '{$city}' ne postoji u bazi.";
        }

        // dohvat prognoze za taj grad
        $prognoze = $grad->forecasts;

        // vrati view forecasts.blade.php
        return view('forecasts', compact('prognoze'));
    }
}
