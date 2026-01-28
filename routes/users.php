
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GetUserWithContactsController;

Route::get('/contacts',GetUserWithContactsController::class)->middleware('auth:sanctum');