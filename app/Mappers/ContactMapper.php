<?php

namespace App\Mappers;

use App\Entities\ContactEntity;
use App\Models\Contacts;

class ContactMapper
{
    public static  function toDomain(Contacts $model): ContactEntity
    {
        return new ContactEntity(
            id: $model->id,
            name: $model->nombre,
            email: $model->email,
            lastName: $model->apellido,
            phone: $model->telefono,
            description: $model->descripcion ?? '',
            userId: $model->usuario_id
        );

    }

}
