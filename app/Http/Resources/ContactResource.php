<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->name,
            'apellido' => $this->lastname,
            "correo" => $this->email,
            "telefono" => $this->phone,
            "descripcion" => $this->description ?? '',
            "fecha_creacion" => $this->date,
            'usuario_id' => $this->userId ?? null

        ];
    }
}
