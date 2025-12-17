<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\ForecastController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard ruta
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Auth middleware grupe
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// OVO JE TVOJA STARA RUTA ZA PRIKAZ VREMENA (NE DIRAMO)
Route::get('/prognoza', [WeatherController::class, 'index']);

// NOVA RUTA ZA VJEŽBU: forecast/{city} 
Route::get('/forecast/{city}', [ForecastController::class, 'index']);

require __DIR__ . '/auth.php';


