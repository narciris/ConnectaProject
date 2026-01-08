<?php


namespace App\Repositories\EloquentImpl;
use App\Models\Contacts;
use App\Repositories\Contracts\ContactInterfaceRespository;
use Illuminate\Support\Facades\Log;


class EloquentContactRepository implements ContactInterfaceRespository{

    public function getAll(array $filters = null)
    {
        return Contacts::query()
            ->when(
                isset($filters['busqueda']),
                function ($query) use ($filters) {
                    $query->where('nombre', 'like', '%' . $filters['busqueda'] . '%')
                        ->orWhere('email', 'like', '%' . $filters['busqueda'] . '%');
                }
            )
            ->get();
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
       return Contacts::destroy($id);

    }

   public function findId(int $id, int $userId)
{
    return Contacts::where('id', $id)
                   ->where('usuario_id', $userId)
                   ->first();
}

}
