<?php

namespace App\Observers;
use App\Events\DeleteContactEvent;
use App\Mappers\ContactMapper;
use App\Models\Contacts;
use Illuminate\Support\Facades\Log;

class DeleteContactObserver
{
    public function deleted(Contacts $contact)
    {
        Log::info("observador para eliminar");
        event(new DeleteContactEvent(ContactMapper::toDomain($contact)));

    }
}
