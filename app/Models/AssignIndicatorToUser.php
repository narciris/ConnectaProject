<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Indicator,Parametrization,User};


class AssignIndicatorToUser extends Model
{

protected $table = 'assign_indicator_user';
    protected $fillable = [
        'indicator_id',
        'parametrization_id',
        'user_id'
    ];

    public function indicator(){
        return $this->belongsTo(Indicator::class);

    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function parametrization(){
        return $this->belongsTo(Parametrization::class);
    }
}
