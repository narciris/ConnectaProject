<?php

use App\Http\Controllers\CreateContactController;
use App\Http\Controllers\GetAllContactsController;
use App\Http\Controllers\UpdateContactController;
use Illuminate\Support\Facades\Route;

Route::post('/contactos',CreateContactController::class)->middleware('auth:sanctum');
Route::get('/contactos',GetAllContactsController::class)->middleware('auth:sanctum');
Route::put('/contactos/{id}',UpdateContactController::class)->middleware('auth:sanctum');