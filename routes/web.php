<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\AdminForecastsController;
use App\Http\Middleware\AdminCheckMiddleware;

// Homepage
Route::view('/', 'welcome');

// Public weather page
Route::get('/prognoza', [WeatherController::class, 'index']);

Route::get('/forecast/search', [ForecastController::class, 'search']);
// Public forecast by city
Route::get('/forecast/{city:name}', [ForecastController::class, 'index'])
    ->where('city', '^(?!search$).+');

// =========================
// ADMIN WEATHER PAGE
// =========================

Route::prefix('admin')->middleware(AdminCheckMiddleware::class)->group(function () {
    // Admin weather page
    Route::view('/weather', 'admin.weather_index');

    // Save weather (POST)
    Route::post('/weather/update', [AdminWeatherController::class, 'update'])
        ->name('weather.update');

    // =========================
    // ADMIN FORECAST PAGE
    // (prvi dio domaceg)
    // =========================

    // Samo prikaz stranice sa listom forecastova
    Route::view('/forecasts', 'admin.forecast_index');

    Route::post('/forecasts/create', [AdminForecastsController::class, 'create'])
        ->name('forecasts.create');
});



// Dashboard (default Laravel)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
