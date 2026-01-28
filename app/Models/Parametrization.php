<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Parametrization;

class Parametrization extends Model
{

    protected $table = 'parametrization';
    protected $fillable = [
        'name',
        'min_value',
        'max_value',
        'min_points',
        'max_points',
        'indicator_id'
        ,'is_default'

    ];

    public function indicator(){
        $this->belongsToMany(
            
        Indicator::class,
        'indicator_parametrization'
        );
    }
}
