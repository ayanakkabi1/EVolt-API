<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChargingStationController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ReservationController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register',[UserAuthController::class,'register']);
Route::post('login',[UserAuthController::class,'login']);
Route::post('logout',[UserAuthController::class,'logout'])
  ->middleware('auth:sanctum');
Route::post('create',[ReservationController::class,'store'])
  ->middleware('auth:sanctum');
Route::post('create-charging-stations', [ChargingStationController::class, 'store'])
  ->middleware('auth:sanctum');