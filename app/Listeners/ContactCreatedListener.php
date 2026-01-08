<?php

namespace App\Listeners;

use App\Events\ContactCreatedEvent;
use App\Services\CreateContactUseCase;
use App\Services\CreateNotificationUseCase;


class ContactCreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactCreatedEvent $event): void
    {
        app(CreateNotificationUseCase::class)->execute([
            'titulo'=> 'contacto_creado',
            'mensaje'=> 'Nuevo contacto',
            'usuario_id'=> $event->contactEntity->userId
        ]);
    }
}
