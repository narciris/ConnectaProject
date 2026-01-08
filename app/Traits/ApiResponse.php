<?php

namespace App\Traits;

trait ApiResponse
{
    public function success (
        string $message ,
        array $data) {
        return response()->json([
            'status'=> 'success',
            'message' => $message ?? '',
            'data' => $data  ?? []
        ]);
    }

    public function error(string|null $message = '', array|null $data = null){
        return response()->json([
            'status' => 'error',
            'message'=> $message ?? 'Error al procesa solicitud',
            'data' => $data ?? []
        ]);

    }
    public function successBasic (
        string $message ,
        array $data) {
        return response()->json([
            'status'=> 'success',
            'message' => $message ?? ''

        ]);
    }
}
