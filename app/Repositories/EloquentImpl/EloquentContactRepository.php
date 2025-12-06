<?php


namespace App\Repositories\EloquentImpl;
use App\Models\Contacts;
use App\Repositories\Contracts\ContactInterfaceRespository;


class EloquentContactRepository implements ContactInterfaceRespository{

    public function getAll()
    {
    }

    public function create(array $data){
        return Contacts::create($data);
    }
}