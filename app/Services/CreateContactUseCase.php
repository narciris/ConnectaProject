<?php
 
 namespace App\Services;

use App\Repositories\Contracts\ContactInterfaceRespository;

class CreateContactUseCase {




    public function __construct(private readonly ContactInterfaceRespository $contactRepo)
    {

    }


    public function execute(array $data)
    {
        

        return $this->contactRepo->create($data);

    }
    



}