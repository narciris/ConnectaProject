<?php

namespace App\Observers;

use App\Events\UpdatedContactEvent;
use App\Mappers\ContactMapper;
use App\Models\Contacts;

class UpdateContactObserver
{
    public function updated(Contacts $contact)
    {
      event(new UpdatedContactEvent(ContactMapper::toDomain($contact)));
    }
}
