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

Route::get("/CardColor/create",[ColoredCardController::class,'SendDataColoredCard'])->name('card.SendDataColoredCard');
Route::post("/CardColor",[ColoredCardController::class,'ReceiveDataAndCreateColoredCard'])->name('card.ReceiveDataAndCreateColoredCard');
Route::get("/CardColor/{card}",[ColoredCardController::class,'DeleteColoredCard'])->name('card.DeleteColoredCard');
Route::get("/CardColor/{card}/update",[ColoredCardController::class,'RedirectPageToEditColoredCard'])->name('card.RedirectPageToEditColoredCard');
Route::post('/CardColor/{card}',[ColoredCardController::class,'UpdateColoredCard'])->name('card.UpdateColoredCard');
//------------------------------------------------------------------------------------------------
Route::get("/player/create",[PlayerController::class,'SendDataPlayer'])->name('player.SendDataPlayer');
Route::post("/player",[PlayerController::class,'ReceiveDataAndCreatePlayer'])->name('player.ReceiveDataAndCreatePlayer');
Route::get("/player/{player}",[PlayerController::class,'DeletePlayer'])->name('player.DeletePlayer');
Route::get("/player/{player}/update",[PlayerController::class,'RedirectPageToEditPlayer'])->name('player.RedirectPageToEditPlayer');
Route::post('/player/{player}',[PlayerController::class,'UpdatePlayer'])->name('player.UpdatePlayer');
//------------------------------------------------------------------------------------------------
Route::get("/referee/create",[RefereeController::class,'SendDataReferee'])->name('referee.SendDataReferee');
Route::post("/referee",[RefereeController::class,'ReceiveDataAndCreateReferee'])->name('referee.ReceiveDataAndCreateReferee');
Route::get("/referee/{referee}",[RefereeController::class,'DeleteReferee'])->name('referee.DeleteReferee');
Route::get("/referee/{referee}/update",[RefereeController::class,'RedirectPageToEditReferee'])->name('referee.RedirectPageToEditReferee');
Route::post('/referee/{referee}',[RefereeController::class,'UpdateReferee'])->name('referee.UpdateReferee');
//------------------------------------------------------------------------------------------------
Route::get("/technical/create",[TechnicalDirectorController::class,'SendDataTechnical'])->name('technical.SendDataTechnical');
Route::post("/technical",[TechnicalDirectorController::class,'ReceiveDataAndCreateTechnical'])->name('technical.ReceiveDataAndCreateTechnical');
Route::get("/technical/{technical}",[TechnicalDirectorController::class,'DeleteTechnical'])->name('technical.DeleteTechnical');
Route::get("/technical/{technical}/update",[TechnicalDirectorController::class,'RedirectPageToEditTechnical'])->name('technical.RedirectPageToEditTechnical');
Route::post('/technical/{technical}',[TechnicalDirectorController::class,'UpdateTechnical'])->name('technical.UpdateTechnical');
//------------------------------------------------------------------------------------------------
Route::get("/sport/create",[SportController::class,'SendDataSport'])->name('sport.SendDataSport');
Route::post("/sport",[SportController::class,'ReceiveDataAndCreateSport'])->name('sport.ReceiveDataAndCreateSport');
//------------------------------------------------------------------------------------------------
Route::get("/user/create",[UserController::class,'SendDataUser'])->name('user.SendDataUser');
Route::post("/user",[UserController::class,'ReceiveDataAndCreateUser'])->name('user.ReceiveDataAndCreateUser');
//------------------------------------------------------------------------------------------------
Route::get("/publicitie/create",[PublicitieController::class,'SendDataPublicitie'])->name('publicitie.SendDataPublicitie');
Route::post("/publicitie",[PublicitieController::class,'ReceiveDataAndCreatePublicitie'])->name('publicitie.ReceiveDataAndCreatePublicitie');