<?php

 namespace App\Services;

use App\Dtos\ContactoDtoResponse;
use App\Events\ContactCreated;
use App\Repositories\Contracts\ContactInterfaceRespository;
use Illuminate\Support\Facades\Auth;

class CreateContactUseCase {


    public function __construct(
        private readonly ContactInterfaceRespository $contactRepo
    )
    {}

    public function execute(array $data)
    {

        $contact = $this->contactRepo->create($data);

        return ContactoDtoResponse::fromModel($contact);

    }




}
