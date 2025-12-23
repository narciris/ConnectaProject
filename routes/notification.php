<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CreateNotificationController;
use App\Http\Controllers\UnreadNotificationController;
use Illuminate\Support\Facades\Route;


Route::get('/notificaciones',NotificationController::class)->middleware('auth:sanctum');
Route::post('/notificaciones',CreateNotificationController::class)->middleware('auth:sanctum');
Route::get('/notificaciones/no-leidas',UnreadNotificationController::class)->middleware('auth:sanctum');
