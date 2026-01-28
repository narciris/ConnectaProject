<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Variables;

class VariablesUser extends Model
{
    protected $table = 'variables_usuarios';
    protected $fillable= [
        'variable_id',
          'usuario_id'
    ];

    public function usuario (){
        $this->belongsTo(User::class);
    }

    public function variable(){
        $this->belongsTo(Variables::class);
    }
}
