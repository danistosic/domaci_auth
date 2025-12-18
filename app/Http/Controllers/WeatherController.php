<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class WeatherController extends Controller
{
    public function index()
    {
        // Dohvati sva vremena, zajedno sa gradovima (relacija)
        $prognoza = Weather::with('city')->get();

        // Pošalji u view
        return view('weather', compact('prognoza'));
    }
}
