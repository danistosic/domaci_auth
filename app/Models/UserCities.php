<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCities extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'city_id',
    ];

    public function city()
    {
        return $this->belongsTo(Cities::class, 'city_id', 'id');
    }
}
