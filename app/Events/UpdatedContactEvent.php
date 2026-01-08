<?php

namespace App\Events;
use App\Entities\ContactEntity;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class UpdatedContactEvent implements ShouldBroadcastNow
{

    public function __construct(public ContactEntity $contactEntity)
    {

    }

    public function broadcastOn():array
    {
        return [
            new Channel('contactos')
        ];
    }

    public function broadcastAs()
    {
        return 'contact.updated';
    }
}
