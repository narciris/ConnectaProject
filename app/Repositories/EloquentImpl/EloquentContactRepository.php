<?php


namespace App\Repositories\EloquentImpl;
use App\Models\Contacts;
use App\Repositories\Contracts\ContactInterfaceRespository;


class EloquentContactRepository implements ContactInterfaceRespository{

    public function getAll()
    {
        return Contacts::all();
    }

    public function create(array $data){
        return Contacts::create($data);
    }

    
    public function update(
        int $id, 
    array $data
    ){
        $findContact  = Contacts::findOrFail($id); 
        $findContact->update($data);
        return $findContact;
    }

    public function delete(int $id)
    {
        $contact = Contacts::findOrFail($id);
        $contact->delete();
        return $contact;

    }

    public function findId(int $id, int $userId)
    {
        return Contacts::find(['id', $id,'usuario_id' => $userId])->first();
    }
}