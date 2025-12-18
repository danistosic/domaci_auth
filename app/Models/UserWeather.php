<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserWeather extends Model
{
    protected $table = 'user_weather';

    protected $fillable = [
        'user_id',
        'weather_id',
    ];

    // UserWeather pripada jednom User-u
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // UserWeather pripada jednom Weather zapisu
    public function weather()
    {
        return $this->belongsTo(Weather::class, 'weather_id', 'id');
    }
}
