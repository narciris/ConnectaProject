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
        return $this->hasMany(Parametrization::class,'indicator_id');
    }

    public function employees(){
        return $this->belongsToMany(
            User::class,
        'assign_indicator_user')->withPivot('parametrization_id');
    }
}
