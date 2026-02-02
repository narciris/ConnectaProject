
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndicatorController;

Route::get('/indicators',[IndicatorController::class,'getAll'])->middleware('auth:sanctum');
Route::post('/indicators',[IndicatorController::class,'create'])->middleware('auth:sanctum');
Route::post('/indicators/assign',[IndicatorController::class,'assignParametrization'])->middleware('auth:sanctum');