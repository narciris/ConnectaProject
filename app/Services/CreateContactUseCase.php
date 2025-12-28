<?php

 namespace App\Services;

use App\Events\ContactCreated;
use App\Repositories\Contracts\ContactInterfaceRespository;
use Illuminate\Support\Facades\Auth;

class CreateContactUseCase {




    public function __construct(private readonly ContactInterfaceRespository $contactRepo)
    {

    }


    public function execute(array $data)
    {


        $contact = $this->contactRepo->create($data);
        event(new ContactCreated(
            contact: $contact,
            user: Auth::user()
        ));

        return $contact;

    }




}
