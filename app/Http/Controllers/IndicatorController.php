<?php
namespace App\Http\Controllers;
use App\Traits\ApiResponse;
use App\Models\Indicator;
use App\Http\Resources\IndicatorResource;
use Illuminate\Http\Request;

class IndicatorController {
    use ApiResponse;

  public function getAll(){
   $indicators = Indicator::with('parametrization:id,name')->get();

   return $this->success('Succefly', IndicatorResource::collection($indicators));
  
  }

  public function create(Request $request)
  {
    $validated = $request->validate([
        'name' => 'string|required',
        'type_graphic' => 'string|required'

    ]);
    $newIndicator  = Indicator::create($validated);

     return new IndicatorResource($newIndicator);

  }

  public function assignParametrization(int $indicatorId, 
  int $parametrizationId, Request $request){
    
       $assign = AssignIndicatorToUsewr::create();
  }

}