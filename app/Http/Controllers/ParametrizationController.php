<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parametrization;

class ParametrizationController extends Controller
{
    public function getAll(){
        return  Parametrization::all();
    }
    public function create(Request $request){
       $validated = $request->validate([
        'name' => 'string|required',
         'min_value' => 'required|numeric',
         'max_value' => 'required|numeric',
         'min_points' => 'required|numeric',
         'max_points' => 'required|numeric',
         'is_default'=> 'required'
       ]);

        return Parametrization::create($validated);
    }
    public function assignUser()
    {

    }
}
