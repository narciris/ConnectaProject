<?php

namespace App\Dtos;

class ContactoDtoResponse {


    public ?string $name;
    public ?string $email;
    public ?string $description;
    public ?string $phone;
    public ?string $date;



    public function __construct(
    string $name,
    string $email, 
    string $description,
     string $phone,
      string $date)
    {
        $this->name = $name;
        $this->email = $email;
        $this->description = $description;
        $this->phone = $phone;
        $this->date = $date;
    }

    public static function fromModel($model){
           return new self(
            $model->nombre  ?? '',
            $model->email ?? '',
            $model->descripcion ?? '',
            $model->telefono ?? '',
            $model->created_at ?? ''
           );
    } 

    public static function fromArray($model){
    return new self(
        $model['nombre'] ,
        $model['email'] ,
        $model['descripcion'] ,
        $model['telefono'] ,
        $model['created_at']
    );
}



    public function toArray(){

        return [
            'nombre' => $this->name,
            "correo" => $this->email,
            "telefono" => $this->phone,
            "descripcion" => $this->description ?? '',
            "fecha_creacion" => $this->date

        ];
    }

}