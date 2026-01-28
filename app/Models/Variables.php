<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Variables extends Model
{
    protected $fillable = [
        'nombre',
        'id'
    ];

    public function empleados(){
       return $this->belongsToMany(User::class,'variables_usuarios','variable_id','usuario_id');
    }
}
