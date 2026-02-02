
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{GetUserWithContactsController,UserController};

Route::get('/contacts',GetUserWithContactsController::class)->middleware('auth:sanctum');
Route::get('/users',[UserController::class,'getAll'])->middleware('auth:sanctum');