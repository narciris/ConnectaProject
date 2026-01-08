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
 Log::info("Data llegando al use case update", ["datos del request" =>$data, "id"=>$id,"userId"=>$userId]);
      $this->conctRepo->update($id,$data);

      $contact = $this->conctRepo->findId($id,$userId);
      Log::info("resultado en el usecase:", [$contact]);

      return ContactoDtoResponse::fromModel($contact);

    }
}
