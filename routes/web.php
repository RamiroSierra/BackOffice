<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoredCardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\TechnicalDirectorController;
use App\Http\Controllers\VipController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\PublicitieController;

Route::get("/CardColor/create",[ColoredCardController::class,'create'])->name('card.create');
Route::post("/CardColor",[ColoredCardController::class,'keep'])->name('card.keep');
Route::get("/CardColor/{card}",[ColoredCardController::class,'delete'])->name('card.delete');
Route::get("/CardColor/{card}/update",[ColoredCardController::class,'edit'])->name('card.edit');
Route::post('/CardColor/{card}',[ColoredCardController::class,'update'])->name('card.update');
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
Route::get("/sport/create",[SportController::class,'SendDataSport'])->name('sport.SendDataSport');
Route::post("/sport",[SportController::class,'ReceiveDataAndCreateSport'])->name('sport.ReceiveDataAndCreateSport');
//------------------------------------------------------------------------------------------------
Route::get("/user/create",[UserController::class,'SendDataUser'])->name('user.SendDataUser');
Route::post("/user",[UserController::class,'ReceiveDataAndCreateUser'])->name('user.ReceiveDataAndCreateUser');
//------------------------------------------------------------------------------------------------
Route::get("/publicitie/create",[PublicitieController::class,'SendDataPublicitie'])->name('publicitie.SendDataPublicitie');
Route::post("/publicitie",[PublicitieController::class,'ReceiveDataAndCreatePublicitie'])->name('publicitie.ReceiveDataAndCreatePublicitie');