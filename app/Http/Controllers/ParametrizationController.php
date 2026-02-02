<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametrization;
use Illuminate\Support\Facades\Log;

class ParametrizationController extends Controller
{
    public function getAll(int $indicatorId){
        Log::info("indicador_id",[$indicatorId]);
        $parametrization=  Parametrization::where('indicator_id',$indicatorId)->get();
        Log::info("parametrizaciones",[$parametrization]);
        return $parametrization;
    }

    public function create(Request $request){
       $validated = $request->validate([
        'name' => 'string|required',
         'min_value' => 'required|numeric',
         'max_value' => 'required|numeric',
         'min_points' => 'required|numeric',
         'max_points' => 'required|numeric',
         'indicator_id' => 'required|numeric|exists:indicator,id',
         'is_default'=> 'required'
       ]);

        return Parametrization::create($validated);
    }
    public function assignUser()
    {

    }
}
