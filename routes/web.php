<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\AdminForecastsController;

// Homepage
Route::get('/', function () {
    return view('welcome');
});

// Public weather page
Route::get('/prognoza', [WeatherController::class, 'index']);

// Public forecast by city
Route::get('/forecast/{city:name}', [ForecastController::class, 'index']);

// =========================
// ADMIN WEATHER PAGE
// =========================

// Admin weather page
Route::view('/admin/weather', 'admin.weather_index');

// Save weather (POST)
Route::post('/admin/weather/update', [AdminWeatherController::class, 'update'])
    ->name('weather.update');

// =========================
// ADMIN FORECAST PAGE
// (prvi dio domaceg)
// =========================

// Samo prikaz stranice sa listom forecastova
Route::view('/admin/forecasts', 'admin.forecast_index');

Route::post("/admin/forecasts/create", [AdminForecastsController::class, "create"])->name("forecasts.create");



// Dashboard (default Laravel)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
