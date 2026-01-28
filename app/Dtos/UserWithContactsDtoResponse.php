<?php 
namespace App\Dtos;
class UserWithContactsDtoResponse {

  public string $name;
  public string $email;
  public Collection $contacts;

  public  static function fromModel(
    $model) :self
  {
    return new self (
        $model->name,
        $model->email,
        $model->contacts

    );
  }

}