<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\EmployeeResoruce;
use Illuminate\Http\Resources\Json\JsonResource;

class VariablesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nobre' => $this->nombre,
            'id' => $this->id,
            'empleados' => EmployeeResoruce::collection($this->empleados),
        ];
    }
}
