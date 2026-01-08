<?php
namespace App\Services;
use App\Dtos\ContactoDtoResponse;
use App\Exceptions\ContactNotFoundException;
use App\Repositories\Contracts\ContactInterfaceRespository;

class DeleteContactosUseCase
 {

    public function __construct(private readonly ContactInterfaceRespository $contactRepo)
    {
     
    }

    public function execute(int $id, int $userId)
    {
        $result = $this->contactRepo->findId($id, $userId);
        if(!$result){
            throw new ContactNotFoundException("contacto no existe");
        }
        $this->contactRepo->delete($result->id);

        return ContactoDtoResponse::fromModel($result);

    }



}