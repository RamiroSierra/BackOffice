<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\RefereeController;
use App\Http\Controllers\TechnicalDirectorController;
use App\Http\Controllers\VipController;
use App\Http\Controllers\SportController;
use App\Http\Controllers\PublicitieController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ForPointController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\ForSetController;
use App\Http\Controllers\SetController;

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
Route::get("/sport/{sport}/update",[SportController::class,'RedirectPageToEditSport'])->name('sport.RedirectPageToEditSport');
Route::post('/sport/{sport}',[SportController::class,'UpdateSport'])->name('sport.UpdateSport');
//fata delete
//------------------------------------------------------------------------------------------------
Route::get("/user/create",[UserController::class,'SendDataUser'])->name('user.SendDataUser');
Route::post("/user",[UserController::class,'ReceiveDataAndCreateUser'])->name('user.ReceiveDataAndCreateUser');
Route::get("/user/{vip}/card/create",[CardController::class,'SendDataCard'])->name('card.SendDataCard');
Route::post("/user/{vip}/card",[CardController::class,'ReceiveDataAndCreateCard'])->name('card.ReceiveDataAndCreateCard');

Route::get("/user/{standard}/update",[UserController::class,'RedirectPageToEditStandard'])->name('standard.RedirectPageToEditStandard');
Route::post('/user/{standard}',[UserController::class,'UpdateStandard'])->name('standard.UpdateStandard');
//en progreso
Route::get("/user/{standard}",[UserController::class,'DeleteStandard'])->name('user.DeleteStandard');




//------------------------------------------------------------------------------------------------
Route::get("/publicitie/create",[PublicitieController::class,'SendDataPublicitie'])->name('publicitie.SendDataPublicitie');
Route::post("/publicitie",[PublicitieController::class,'ReceiveDataAndCreatePublicitie'])->name('publicitie.ReceiveDataAndCreatePublicitie');
//------------------------------------------------------------------------------------------------
Route::get("/team/create",[TeamController::class,'SendDataTeam'])->name('team.SendDataTeam');
Route::post("/team",[TeamController::class,'ReceiveDataAndCreateTeam'])->name('team.ReceiveDataAndCreateTeam');
//------------------------------------------------------------------------------------------------
Route::get("/forPoint/create",[ForPointController::class,'SendDataForPoint'])->name('forPoint.SendDataForPoint');
Route::post("/forPoint",[ForPointController::class,'ReceiveDataAndCreateForPoint'])->name('forPoint.ReceiveDataAndCreateForPoint');
//------------------------------------------------------------------------------------------------
Route::get("/league/create",[LeagueController::class,'SendDataLeague'])->name('league.SendDataLeague');
Route::post("/league",[LeagueController::class,'ReceiveDataAndCreateLeague'])->name('league.ReceiveDataAndCreateLeague');
//------------------------------------------------------------------------------------------------
Route::get("/record/create",[RecordController::class,'SendDataRecord'])->name('record.SendDataRecord');
Route::post("/record",[RecordController::class,'ReceiveDataAndCreateRecord'])->name('record.ReceiveDataAndCreateRecord');
//------------------------------------------------------------------------------------------------
Route::get("/forSet/create",[ForSetController::class,'SendDataForSet'])->name('forSet.SendDataForSet');
Route::post("/forSet",[ForSetController::class,'ReceiveDataAndCreateForSet'])->name('forSet.ReceiveDataAndCreateForSet');
Route::get("/forSet/{forSet}/set/create",[SetController::class,'SendDataSet'])->name('set.SendDataSet');
Route::post("/forSet/{vip}/set",[SetController::class,'ReceiveDataAndCreateSet'])->name('set.ReceiveDataAndCreateSet');
Route::get("/forSet/back",[SetController::class,'RedirectPageCreateForSet'])->name('set.RedirectPageCreateForSet');