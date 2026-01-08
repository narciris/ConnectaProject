<?php

namespace App\Repositories\Contracts;

interface ContactInterfaceRespository {


    public function getAll(?array $filters);

    public function create(array $data);

    public function update(int $id, array $data);

    public function delete(int $id);
    public function findId ( int $id, int $userId);
}
