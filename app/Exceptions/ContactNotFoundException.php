<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ContactNotFoundException extends Exception
{
      public function render(): JsonResponse
    {
        return response()->json([
            'message' => $this->getMessage() ?: 'Contacto no existe',
            'error' => true
        ], 404);
    }
}
