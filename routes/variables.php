<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VariableController;

Route::get('/variables',[VariableController::class,'getAll'])->middleware('auth:sanctum');
Route::post('/variables',[VariableController::class,'create'])->middleware('auth:sanctum');
Route::post('/variables/assigned',[VariableController::class,'assignedUser'])->middleware('auth:sanctum');