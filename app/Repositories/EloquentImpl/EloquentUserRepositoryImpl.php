<?php 

namespace App\Repositories\EloquentImpl;

use App\Repositories\Contracts\UserInterfaceRepository;
use App\Models\User;

class EloquentUserRepositoryImpl implements UserInterfaceRepository{

  public function getAll(){
    
  }

  public function getContactByUserID(int $userId)
  {
    return User::with('contacts')
    ->find($userId);

  }

  public function findById(int $userId){
    return User::findOrFail($userId);
  }


}