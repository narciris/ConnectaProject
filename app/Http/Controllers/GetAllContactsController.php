<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\GetAllUsersUseCase;

class GetAllContactsController extends Controller
{

    use ApiResponse;
   
    public function __invoke(GetAllUsersUseCase $getAllUseCase)
    {
        $result = $getAllUseCase->execute();

          return $this->success("contactos retornados de manera exitos",$result->toArray());

    }
}
