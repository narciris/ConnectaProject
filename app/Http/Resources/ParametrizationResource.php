<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParametrizationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nombre' => $this->name,
            'minimo_valor' => $this->min_value,
            'maximo_valor' => $this->max_value,
            'minimo_puntaje' => $this->min_points,
            'maximo_puntaje' => $this->max_points,
            'id' => $this->id
        ];
    }
}
