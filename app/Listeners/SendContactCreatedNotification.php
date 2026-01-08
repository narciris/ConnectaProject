<?php

namespace App\Listeners;

use App\Events\ContactCreated;
use App\Services\CreateNotificationUseCase;
use Illuminate\Support\Facades\Auth;

class SendContactCreatedNotification
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
    public function handle(ContactCreated $event): void
    {
       app(
           CreateNotificationUseCase::class
       )->execute([
           'titulo'=>'Creado contacto',
           'mensaje' => 'Contacto nuevo creado',
           'usuario_id'=>Auth::user()->id

       ]);
    }
}
