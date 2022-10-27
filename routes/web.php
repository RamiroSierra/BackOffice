<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoredCardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\PlayerController;


Route::get("/CardColor/create",[ColoredCardController::class,'create'])->name('card.create');
Route::post("/CardColor",[ColoredCardController::class,'keep'])->name('card.keep');
Route::get("/CardColor/{card}",[ColoredCardController::class,'delete'])->name('card.delete');
Route::get("/CardColor/{card}/update",[ColoredCardController::class,'edit'])->name('card.edit');
Route::post('/CardColor/{card}',[ColoredCardController::class,'update'])->name('card.update');
//------------------------------------------------------------------------------------------------
Route::get("/Standard/create",[StandardController::class,'create'])->name('standard.create');
Route::post("/Standard",[StandardController::class,'keep'])->name('Standard.keep');
//------------------------------------------------------------------------------------------------
Route::get("/player/create",[PlayerController::class,'create'])->name('player.create');
Route::post("/player",[PlayerController::class,'keep'])->name('player.keep');
Route::get("/player/{player}",[PlayerController::class,'delete'])->name('player.delete');
Route::get("/player/{player}/update",[PlayerController::class,'edit'])->name('player.edit');
Route::post('/player/{player}',[PlayerController::class,'update'])->name('player.update');
//------------------------------------------------------------------------------------------------

