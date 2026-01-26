<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ForecastController;
use App\Http\Controllers\AdminWeatherController;
use App\Http\Controllers\AdminForecastsController;
use App\Http\Controllers\UserCitiesController;
use App\Http\Middleware\AdminCheckMiddleware;

// Public
Route::get('/', function () {

    $userFavourites = [];

    $user = Auth::user();

    if ($user !== null) {
        $userFavourites = \App\Models\UserCities::where('user_id', $user->id)->get();
    }

    return view('welcome', compact('userFavourites'));
});

Route::get('/prognoza', [WeatherController::class, 'index']);

Route::get('/forecast/search', [ForecastController::class, 'search'])
    ->name('forecast.search');

Route::get('/forecast/{city:name}', [ForecastController::class, 'index'])
    ->where('city', '^(?!search).+')
    ->name('forecast.permalink');

// User favourites
Route::get('/user-cities/favourite/{city}', [UserCitiesController::class, 'favourite'])
    ->name('city.favourite');

Route::get('/user-cities/unfavourite/{city}', [UserCitiesController::class, 'unfavourite'])
    ->name('city.unfavourite');

// Admin
Route::prefix('admin')
    ->middleware(AdminCheckMiddleware::class)
    ->group(function () {

        Route::view('/weather', 'admin.weather_index');

        Route::post('/weather/update', [AdminWeatherController::class, 'update'])
            ->name('weather.update');

        Route::view('/forecasts', 'admin.forecast_index');

        Route::post('/forecasts/create', [AdminForecastsController::class, 'create'])
            ->name('forecasts.create');
    });

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
