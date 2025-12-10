<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    // Na koju se tablicu ovaj model veže
    protected $table = 'weather';

    // Koja polja smijemo puniti iz koda (mass assignment)
    protected $fillable = [
        'city',
        'temperature',
    ];
}

