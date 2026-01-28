<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Parametrization};

class Indicator extends Model
{
    protected $table = 'indicator';
    protected $fillable = [
        'name',
        'type_graphic',
        
    ];

    public function parametrization(){
        return $this->belongsToMany(Parametrization::class,'indicator_parametrization');
    }
}
