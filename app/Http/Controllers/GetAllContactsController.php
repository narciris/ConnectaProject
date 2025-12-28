<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\GetAllUsersUseCase;

class GetAllContactsController extends Controller
{

    use ApiResponse;

    public function __invoke(Request $request,GetAllUsersUseCase $getAllUseCase)
    {
        $filter = $request->only(['nombre', 'email']);
        $result = $getAllUseCase->execute($filter);

          return $this->success("contactos retornados de manera exitos",$result->toArray());

    }
}
