<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'name',
    ];

    // Jedan grad ima JEDAN weather zapis
    public function weather()
    {
        return $this->hasOne(Weather::class, 'city_id', 'id');
    }

    // Jedan grad ima VIŠE forecast zapisa
    public function forecasts()
    {
        return $this->hasMany(ForecastsModel::class, 'city_id', 'id')
            ->orderBy('forecast_date', 'asc');
    }
}
