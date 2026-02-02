<?php
namespace App\Http\Controllers;
use App\Traits\ApiResponse;
use App\Models\Indicator;
use App\Models\Parametrization;
use App\Http\Resources\IndicatorResource;
use Illuminate\Support\Facades\{DB,Log};

use Illuminate\Http\Request;
use App\Models\AssignIndicatorToUser;

class IndicatorController {
    use ApiResponse;

  public function getAll(){
   $indicators = 
   Indicator::with('parametrization:indicator_id,id,name,min_value,max_value,min_points,max_points',
   'employees:id,name')->get();

   return $this->success('Succefly', IndicatorResource::collection($indicators));
  
  }

  public function create(Request $request)
  {
    $validated = $request->validate([
        'name' => 'string|required',
        'type_graphic' => 'string|required',
        "valor_minimo" => 'required|numeric',
        "valor_maximo" => 'required|numeric',
        "punto_minimo" => 'required|numeric',
        "punto_maximo" => 'required|numeric'

    ]);
   $indicator  =DB::transaction(function () use ($validated) {
      $newIndicator  = Indicator::create($validated);
       $newParametrization = Parametrization::create([
      "name"=>'default',
      "min_value" => $validated['valor_minimo'],
      "max_value" => $validated['valor_maximo'],
      "min_points" => $validated['punto_minimo'],
      "max_points" => $validated['punto_maximo'],
      "indicator_id"  => $newIndicator->id,
      "is_default" => true
    ]);
    //asignar la parametrizacion al indicador para que quede por default
    
    return $newIndicator;
      
    });
    

     return response()->json(['success'=>true,'data'=> new IndicatorResource($indicator)]);

  }

  // siempre un indicaedor tiene una parametrizacion asignada por default
  // este metodo actualiza la parametrizacion id  si ya tenia la default 
  // si  la parametrizacion_id es null le asigna de cero una..
  //recibe usuarios con sus parametrizacion, y un indicador id para todos

  public function assignParametrization(
     Request $request){
      Log::info("request recibido en el metodo", $request->all());
      $validated = $request->validate([
        'usuarios' => 'required|array',
        'usuarios.*.parametrization_id' => 'nullable|numeric|exists:parametrization,id',
        'usuarios.*.user_id' => 'required|numeric|exists:users,id',
        'indicator_id'=> 'required|numeric|exists:indicator,id',
      ]);

      //buscar indicador
      $findIndicator = Indicator::where('id',$validated['indicator_id'])->first();
      if(!$findIndicator){
        throw new \Exception('indicador no encontrado');
        }

        DB::transaction(function () use($validated,$findIndicator){
           //usuarios enviados desde el request
         $incomingUsers = collect($validated['usuarios']);
      //accedes a los ids de los usuarios
         $incomingUsersIds = $incomingUsers->pluck('user_id')->toArray();
     //usurios actualmente asignados
        $currentUsersId = AssignIndicatorToUser::where('indicator_id',$findIndicator->id)->pluck('user_id')->toArray();
      //devuelve un arrray nuevo con los ids que estan en $current y no estan en $incoming, osea
      //los que estan asignados y ya no vienen en el nuevo array
        $toDetach = array_diff($currentUsersId,$incomingUsersIds);
        if(!empty($toDetach)){
          //si hay coincidencias borrar la relacion de la tabla pivote
          AssignIndicatorToUser::where('indicator_id',$findIndicator->id)
          ->whereIn('user_id',$toDetach)
          ->delete();
          // o podria usar detach de laravel
          // $findIndicator->employees->detach($toDetach);
        }
        //asignar o actualziar los que vienen
        //itera por cada usustio del array usuarios 
        foreach($incomingUsers as $dataUsers){
          $userId = $dataUsers['user_id'];
          $parametrizationId = $dataUsers['parametrization_id'] ??
          $findIndicator->parametrization()->where('is_default',true)->first()->id;

          //validar si la parametrisaztion le pertenece al indicador
          $param = $findIndicator->parametrization()
          ->where('id',$parametrizationId)->exists();
          if(!$param){
            throw new \Exception("la parametrizacion no es de este indicador");
          }
           //busdcar asignacion existente
           $currentAssign = AssignIndicatorToUser::where('indicator_id',$findIndicator->id)
           ->where('user_id',$userId)->first();
           // si encontró algo la actualiza
           if($currentAssign){
            if($currentAssign->parametrization_id != $parametrizationId)
            {  
              Log::warning("Se actualiza la parametrizacin por que es un id diferente al actual");           
         $currentAssign->update(['parametrization_id' =>$parametrizationId]);}              
            //si no la crea de cero
           }else{
            AssignIndicatorToUser::create(
              ['indicator_id' => $findIndicator->id,
              'parametrization_id' => $parametrizationId,
              'user_id' => $userId]
            );

            //posemos usar la de laravel 
            // $findIndicator->users()->syncWithoutDetaching([
            //     $userId => ['parametrization_id' => $paramId]]);
           }

        }

        });

      




      return response()->json(['success'=> true,'message' => 'bien']);
  }

 

}