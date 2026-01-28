<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IndicatorParametrization extends Model
{
    protected $table = 'indicator_parametrization';
    protected $fillable = [
        'indicator_id',
        'parametrization_id'
    ];
}
