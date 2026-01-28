<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Variables;
use App\Models\VariablesUser;
use App\Http\Resources\VariablesResource;


class VariableController extends Controller
{
    public function getAll(){
        $variables = Variables::with('empleados')->get();
        return response()->json(VariablesResource::collection($variables));
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'nombre'=> 'required|string'
        ]);
        $created = Variables::create($validated);
        return response()->json([
            'success' => true,
             'data' => $created
        ]);

    }

   public function assignedUser(Request $request){
    $validated = $request->validate([
        'usuarios_ids' => 'array',
        'usuarios_ids.*' => 'numeric|exists:users,id',
        'variable_id' => 'required|numeric|exists:variables,id',
    ]);
    
    $variableId = $validated['variable_id'];
    $usersIds = $validated['usuarios_ids'];
    
    // Obtener usuarios asignados
    $actualesAsignaciones = VariablesUser::where('variable_id', $variableId)
        ->pluck('usuario_id')->toArray();
    
    // Usuarios a desasignar
    $usuariosDesAsignar = array_diff($actualesAsignaciones, $usersIds);
    
    // Usuarios a asignar
    $usuariosAsignar = array_diff($usersIds, $actualesAsignaciones);
    
    // Desasignar
    VariablesUser::where('variable_id', $variableId) 
        ->whereIn('usuario_id', $usuariosDesAsignar)
        ->delete();
    
    // Asignar
    foreach($usuariosAsignar as $usuario_id){
        VariablesUser::create([
            'variable_id' => $variableId, 
            'usuario_id' => $usuario_id 
        ]);
    }
    
    return response()->json([
        'message' => 'Usuarios sincronizados correctamente',
        'asignados' => count($usuariosAsignar), 
        'desasignados' => count($usuariosDesAsignar) 
    ]);
}
}
