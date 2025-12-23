<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Services\GetNotificationUseCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    use ApiResponse;
    public function __invoke(GetNotificationUseCase $notificationUseCase)
    {
        $userId = Auth::id();
        if(!$userId){
            throw new \Exception("Usuario no autenticado");
        }
        Log::info("usuario autenticado",[$userId]);
        $response = $notificationUseCase->execute($userId);
        return $this->success("Notificaciones de usuario",$response);

    }
}
