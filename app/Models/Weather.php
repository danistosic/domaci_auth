<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    protected $table = 'weather';

    protected $fillable = [
        'city_id',
        'temperature',
    ];

    // Weather pripada jednom gradu
    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }

    // Many-to-many korisnik ↔ weather preko user_weather
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_weather', 'weather_id', 'user_id');
    }
}
