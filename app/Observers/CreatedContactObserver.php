<?php

namespace App\Observers;

use App\Events\ContactCreatedEvent;
use App\Mappers\ContactMapper;
use App\Models\Contacts;
use Illuminate\Support\Facades\Log;

class CreatedContactObserver
{
     public  function  created(Contacts $model)
     {
         Log::info("observer ejecutado,",[
             "dataos" => $model
         ]);
         event(new ContactCreatedEvent(ContactMapper::toDomain($model)));

     }
}
