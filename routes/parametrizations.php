<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParametrizationController;

Route::post('/parametrization',[ParametrizationController::class,'create'])->middleware('auth:sanctum');
Route::get('/parametrization',[ParametrizationController::class,'getAll'])->middleware('auth:sanctum');