<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndicatorResource extends JsonResource
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
            'tipo_grafica' => $this->type_graphic,
            'empleados' => EmployeeResoruce::collection($this->employees),
            'parametrizaciones' => ParametrizationResource::collection($this->parametrization)
        ];
    }
}
