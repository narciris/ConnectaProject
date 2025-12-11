<?php
namespace App\Services;
use App\Dtos\ContactoDtoResponse;
use App\Repositories\Contracts\ContactInterfaceRespository;

class GetAllUsersUseCase {



    public function __construct(private readonly ContactInterfaceRespository $contactRepository)
    {
        
    }


    public function execute (){

        $result = $this->contactRepository->getAll()->toArray();
        $dtos = array_map(function ($contact) {
            return ContactoDtoResponse::fromModel($contact);
        }, $result);
        return $dtos;

    }
}