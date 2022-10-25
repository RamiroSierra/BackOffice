<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoredCardController;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post("/CreateCardColor",[ColoredCardController::class,'create']);
Route::post("/UpdateCardColor",[ColoredCardController::class,'update']);
Route::post("/DeleteCardColor",[ColoredCardController::class,'delete']);
