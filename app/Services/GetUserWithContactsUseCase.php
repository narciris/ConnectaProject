<?php

namespace App\Services;
use App\Repositories\Contracts\UserInterfaceRepository;
use App\Dtos\UserWithContactsDtoResponse;

class GetUserWithContactsUseCase {

public function __construct(private readonly UserInterfaceRepository $userRepo){}

 public function execute(int $userId){
    $findUserId = $this->userRepo->findById($userId);
    if(!$userId){
        throw new \Exception("Usuario no existe");
    }
    $result = $this->userRepo->getContactByUserID($userId);

    return $result ;
 }
}