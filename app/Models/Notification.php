<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'titulo',
        'mensaje',
        'usuario_id',
        'id'
    ];


 public function user()
  {
   return  $this->belongsTo(User::class);
    
 }

   public function scopeUnread($query)
    {
        return $query->where('leido', false);
    }
}
