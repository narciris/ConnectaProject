<?php

namespace App\Dtos;

class ContactoDtoResponse {

   public ?int $id;
    public ?string $name;
    public  ?string $lastname;
    public ?string $email;
    public ?string $description;
    public ?string $phone;
    public ?string $date;
    public  ?int $userId;



    public function __construct(
        ?int $id,
    string $name,
    ?string $lastname,
    string $email,
    string $description,
     string $phone,
      string $date,
        ?int $userId
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->lastname  = $lastname;
        $this->email = $email;
        $this->description = $description;
        $this->phone = $phone;
        $this->date = $date;
        $this->userId = $userId;
    }

    public static function fromModel($model){
           return new self(
               $model->id,
            $model->nombre  ?? '',
            $model->apellido,
            $model->email ?? '',
            $model->descripcion ?? '',
            $model->telefono ?? '',
            $model->created_at ?? '',
               $model->usuario_id
           );
    }

    public static function fromArray($model){
    return new self(
        $model['id'],
        $model['nombre'] ,
        $model['apellido'],
        $model['email'] ,
        $model['descripcion'] ,
        $model['telefono'] ,
        $model['created_at'],
        $model['usuario_id']
    );
}



    public function toArray(){

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
