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
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [UserAuthController::class, 'logout']);
    Route::post('create', [ReservationController::class, 'store']);

    Route::get('/charging-stations', [ChargingStationController::class, 'index']);
    Route::get('/charging-stations/{chargingStation}', [ChargingStationController::class, 'show'])
    ->missing(function(){
      return response()->json([
        'message' => 'Charging station not found'
      ], 404);
    });
    Route::PUT('charging-station/{chargingStation}',[ChargingStationController::class,'update'])
    ->missing(function(){
      return response()->json([
        'message' => 'Charging station not found'
      ], 404);

    });
    Route::delete('charging-station/{chargingStation}',[ChargingStationController::class,'destroy'])
    ->missing(function(){
      return response()->json([
        'message' => 'Charging station not found'
      ], 404);
    });
    Route::post('/charging-stations', [ChargingStationController::class, 'store']);
    Route::apiResource('reservations', ReservationController::class);
    Route::post('/reservations/{reservation}/pay', [ReservationController::class, 'pay']);
    Route::post('/reservations/{reservation}/cancel', [ReservationController::class, 'cancel']);
    
});
Route::middleware(['auth:sanctum', 'admin'])->get('/admin/dashboard', [ReservationController::class, 'dashboard']);