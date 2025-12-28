<?php


namespace App\Repositories\EloquentImpl;
use App\Models\Contacts;
use App\Repositories\Contracts\ContactInterfaceRespository;
use Illuminate\Support\Facades\Log;


class EloquentContactRepository implements ContactInterfaceRespository{

    public function getAll(?array $filters =[])
    {
        Log::info("Filtros recibidos", ["filtros"=> $filters]);
        $query =Contacts::query();
        //por nombre
        if(!empty($filters['nombre'])){

            $query->where('nombre', 'like' ,'%' .$filters['nombre'].'%');

        }
        if(!empty($filter['email'])){
            $query->where('email', 'like' ,'%'.$filters['email']. '%');
        }
        Log::info("query", [$query->get()]);
        return $query->get();
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
