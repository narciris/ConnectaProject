<?php

namespace App\Repositories\Contracts;

interface UserInterfaceRepository {

public function getAll();
public function getContactByUserID(int $userId);
public function findById(int $userId);



}