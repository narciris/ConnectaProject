<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Services\CreateNotificationUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateNotificationController extends Controller
{ use ApiResponse;
   public function __invoke(Request $request,CreateNotificationUseCase $createNotification)
   {
      $data = $request->validate([
        'titulo' => 'string|required',
        'mensaje' => 'string|required'
      ]);
    $data['usuario_id'] = Auth::id();
      $response = $createNotification->execute($data);
      return $this->success("Notificacion creada", $response->toArray());

   }
}
