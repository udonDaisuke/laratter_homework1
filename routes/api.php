<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// 🔽 追加
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\GroupController;

// 🔽 追加
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('schedules',ScheduleController::class);
    Route::apiResource('groups',GroupController::class);
});