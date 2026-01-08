<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'email',
        'telefono',
        'descripcion',
        'usuario_id'
    ];
}
