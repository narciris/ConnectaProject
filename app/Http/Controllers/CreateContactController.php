<?php

namespace App\Http\Controllers;

use App\Services\CreateContactUseCase;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class CreateContactController extends Controller

{
    use ApiResponse;

    public function __invoke(
        Request $request,
       CreateContactUseCase $createContactUseCase)
    {
        $result = $createContactUseCase->execute($request->all());
        return $this->success("Contacto creado correctamente",$result);
        
    }
}
