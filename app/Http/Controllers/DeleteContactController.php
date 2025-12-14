<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use App\Services\DeleteContactosUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteContactController extends Controller
{
    use ApiResponse;
   public function __invoke(DeleteContactosUseCase $deleteUseCase, int $id)
   {
       $userId = Auth::id();
       $result = $deleteUseCase->execute($id, $userId);
       return $this->success("Contacto eliminado",$result->toArray());
   }
}
