<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;

class AdminWeatherController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            "temperature" => "required|numeric",
            "city_id" => "required|exists:cities,id"
        ]);

        // Nađi vremensku prognozu za odabrani grad
        $weather = Weather::where('city_id', $request->city_id)->first();

        if ($weather) {
            $weather->temperature = $request->temperature;
            $weather->save();
        }

        return redirect()->back();
    }
}
