<?php

namespace App\Http\Controllers;
use App\Services\GetUserWithContactsUseCase;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\{Auth,Log};
use App\Http\Resources\UserResource;



class GetUserWithContactsController {
    use ApiResponse;

public function __invoke(
    GetUserWithContactsUseCase $getUserContacts){
    $userID = Auth::id();
            Log::info("Id del usuario",[$userID]);
    $response = $getUserContacts->execute($userID);
    Log::info("Usuario con contactos",[$response]);
   return $this->success('Bien',new UserResource($response));

}
}