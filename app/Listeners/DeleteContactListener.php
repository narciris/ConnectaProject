<?php

namespace App\Listeners;

use App\Events\ContactCreatedEvent;
use App\Events\DeleteContactEvent;
use App\Services\CreateNotificationUseCase;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Testing\Constraints\NotSoftDeletedInDatabase;

class DeleteContactListener
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
    public function handle(DeleteContactEvent $event): void
    {
        Log::info("istner para esdcuchar eliminacion de contactos",[$event]);
        app(CreateNotificationUseCase::class)->execute([
            'titulo'=> 'contacto_Eliminado',
            'mensaje'=> 'Elminado este contacto',
            'usuario_id'=> $event->contactEntity->userId

        ]);
    }
}
