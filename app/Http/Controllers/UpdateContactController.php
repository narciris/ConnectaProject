<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UpdateContactUseCase;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UpdateContactController extends Controller
{

    use ApiResponse;
    public function __invoke( int $contactoId,Request $request ,UpdateContactUseCase $updateUseCase)
    {
            Log::info("entrando al metodo actualizar contacto", [$request->all()]);

    $userId = Auth::user()->id;

        $data = $request->validate(
            [
                'nombre'=> 'string|sometimes',
                'apellido'=>'string|nullable',
                'descripcion'=> 'nullable|string',
                'telefono' => 'sometimes|string',
                'email' => 'sometimes|string'
            ]
            );

           $result = $updateUseCase->execute($contactoId,$userId,$data);
           Log::info("resultado del controlador",[$result]);
           return $this->success("Actualizado correctamente", $result->toArray());

    }
}
