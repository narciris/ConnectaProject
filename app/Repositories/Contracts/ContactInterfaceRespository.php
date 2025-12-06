<?php 

namespace App\Repositories\Contracts;

interface ContactInterfaceRespository {


    public function getAll();

    public function create(array $data);
}