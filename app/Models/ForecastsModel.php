<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastsModel extends Model
{
    protected $table = 'forecasts';

    protected $fillable = [
        'city_id',
        'temperature',
        'forecast_date',
    ];

    // Forecast pripada jednom gradu
    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }
}
