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
}

