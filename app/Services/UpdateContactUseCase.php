<?php

namespace App\Services;

use App\Dtos\ContactoDtoResponse;
use App\Repositories\Contracts\ContactInterfaceRespository;
use Illuminate\Support\Facades\Log;

class UpdateContactUseCase {


    public function __construct (private readonly ContactInterfaceRespository $conctRepo)
    {
        
    }


    public function execute(int $id,int $userId, array $data){

      $this->conctRepo->update($id,$data);

      $contact = $this->conctRepo->findId($id,$userId);
      Log::info("resultado que es:", [$contact]);

      return ContactoDtoResponse::fromModel($contact);
        
    }
}