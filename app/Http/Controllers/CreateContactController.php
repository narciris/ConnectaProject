<?php

namespace App\Http\Controllers;
use App\Services\CreateContactUseCase;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class CreateContactController extends Controller

{
    use ApiResponse;

    public function __invoke(
        Request $request,
       CreateContactUseCase $createContactUseCase)
    {
        $userID = Auth::user()->id;
        $request['usuario_id'] = $userID;
        $result = $createContactUseCase->execute($request->all());
        return $this->success("Contacto creado correctamente",$result->toArray());

    }
}
