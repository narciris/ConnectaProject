<?php
namespace App\Services;
use App\Dtos\ContactoDtoResponse;
use App\Repositories\Contracts\ContactInterfaceRespository;

class GetAllUsersUseCase {



    public function __construct(private readonly ContactInterfaceRespository $contactRepository)
    {

    }


    public function execute (?array $filter =null){

        $result = $this->contactRepository->getAll($filter);
      $dtos = $result->map(function ($contact) {
        return ContactoDtoResponse::fromModel($contact)->toArray();
    });

        return $dtos;

    }
}
