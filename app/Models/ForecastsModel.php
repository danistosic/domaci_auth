<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cities;

class ForecastsModel extends Model
{
    protected $table = 'forecasts';

    protected $fillable = [
        'city_id',
        'temperature',
        'forecast_date',
        'weather_type',
        'probability',
    ];

    // Lista mogućih weather type vrijednosti
    const WEATHERS = ['rainy', 'sunny', 'snowy'];

    // Veza: forecast pripada jednom gradu
    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }
}
