<?php

namespace App\Entities;

class ContactEntity
{
    public int $id;
    public string $name;
    public string $lastName;
    public string $email;
    public string $phone;
    public ?string $description;
    public int $userId;

    public function __construct( int $id,
                                 string $name,
                                 string $email,
                                 string $lastName,
                                 string $phone,
                                 ?string $description,
                                 int $userId)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->lastName = $lastName;
        $this->phone = $phone;
        $this->description = $description;
        $this-> userId = $userId;

    }

}
