<?php

namespace App\Listeners;

use App\Services\CreateNotificationUseCase;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateContactListener
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
    public function handle(object $event): void
    {
        app(CreateNotificationUseCase::class)->execute([
            'titulo'=> 'Contacto acualizado',
            'mensaje' => 'Se actualizo este contacto',
            'usuario_id' => $event->contactEntity->userId
        ]);
    }
}
