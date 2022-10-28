<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoredCardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\TechnicalDirectorController;
use App\Http\Controllers\VipController;
use App\Http\Controllers\SportController;

Route::get("/CardColor/create",[ColoredCardController::class,'create'])->name('card.create');
Route::post("/CardColor",[ColoredCardController::class,'keep'])->name('card.keep');
Route::get("/CardColor/{card}",[ColoredCardController::class,'delete'])->name('card.delete');
Route::get("/CardColor/{card}/update",[ColoredCardController::class,'edit'])->name('card.edit');
Route::post('/CardColor/{card}',[ColoredCardController::class,'update'])->name('card.update');
//------------------------------------------------------------------------------------------------
Route::get("/user/create",[UserController::class,'SendData'])->name('user.sendData');
Route::post("/user",[UserController::class,'receiveAndCreate'])->name('user.receiveAndCreate');
//Route::get("/Standard/{Standard}",[UserController::class,'delete'])->name('Standard.delete');
//------------------------------------------------------------------------------------------------
Route::get("/player/create",[PlayerController::class,'create'])->name('player.create');
Route::post("/player",[PlayerController::class,'keep'])->name('player.keep');
Route::get("/player/{player}",[PlayerController::class,'delete'])->name('player.delete');
Route::get("/player/{player}/update",[PlayerController::class,'edit'])->name('player.edit');
Route::post('/player/{player}',[PlayerController::class,'update'])->name('player.update');
//------------------------------------------------------------------------------------------------
Route::get("/referee/create",[RefereeController::class,'create'])->name('referee.create');
Route::post("/referee",[RefereeController::class,'keep'])->name('referee.keep');
Route::get("/referee/{referee}",[RefereeController::class,'delete'])->name('referee.delete');
Route::get("/referee/{referee}/update",[RefereeController::class,'edit'])->name('referee.edit');
Route::post('/referee/{referee}',[RefereeController::class,'update'])->name('referee.update');
//------------------------------------------------------------------------------------------------
Route::get("/technical/create",[TechnicalDirectorController::class,'create'])->name('technical.create');
Route::post("/technical",[TechnicalDirectorController::class,'keep'])->name('technical.keep');
Route::get("/technical/{technical}",[TechnicalDirectorController::class,'delete'])->name('technical.delete');
Route::get("/technical/{technical}/update",[TechnicalDirectorController::class,'edit'])->name('technical.edit');
Route::post('/technical/{technical}',[TechnicalDirectorController::class,'update'])->name('technical.update');
//------------------------------------------------------------------------------------------------
//Route::get("/technical/create",[TechnicalDirectorController::class,'create'])->name('technical.create');
Route::get("/sport/create",[SportController::class,'create'])->name('sport.create');
Route::post("/sport",[SportController::class,'keep'])->name('sport.keep');
//Route::get("/sport/{sport}",[SportController::class,'delete'])->name('sport.delete');
//Route::get("/sport/{sport}/update",[SportController::class,'edit'])->name('sport.edit');
//Route::post('/sport/{sport}',[SportController::class,'update'])->name('sport.update');