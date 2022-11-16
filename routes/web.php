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
use App\Http\Controllers\LoginController;

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
Route::get('/sport/{sport}',[SportController::class,'DeleteSport'])->name('sport.DeleteSport');
Route::get("/sport/{sport}/update",[SportController::class,'RedirectPageToEditSport'])->name('sport.RedirectPageToEditSport');
Route::post('/sport/{sport}',[SportController::class,'UpdateSport'])->name('sport.UpdateSport');
//------------------------------------------------------------------------------------------------
Route::get("/user/create",[UserController::class,'SendDataUser'])->name('user.SendDataUser');
Route::post("/user",[UserController::class,'ReceiveDataAndCreateUser'])->name('user.ReceiveDataAndCreateUser');
Route::get("/user/{vip}/card/create",[CardController::class,'SendDataCard'])->name('card.SendDataCard');
Route::post("/user/{vip}/card",[CardController::class,'ReceiveDataAndCreateCard'])->name('card.ReceiveDataAndCreateCard');
Route::get('/user/{user}',[UserController::class,'DeleteVipUser'])->name('user.DeleteVipUser');
Route::get('/user/{userr}',[UserController::class,'DeleteStandardUser'])->name('user.DeleteStandardUser');
Route::get("/user/{user}/update",[UserController::class,'RedirectPageToEditUser'])->name('user.RedirectPageToEditUser');
Route::post('/user/{userr}',[UserController::class,'UpdateUser'])->name('user.UpdateUser');
//------------------------------------------------------------------------------------------------
Route::get("/publicitie/create",[PublicitieController::class,'SendDataPublicitie'])->name('publicitie.SendDataPublicitie');
Route::post("/publicitie",[PublicitieController::class,'ReceiveDataAndCreatePublicitie'])->name('publicitie.ReceiveDataAndCreatePublicitie');
Route::get('/publicitie/{publicitie}',[PublicitieController::class,'DeletePublicitie'])->name('publicitie.DeletePublicitie');
Route::get("/publicitie/{publicitie}/update",[PublicitieController::class,'RedirectPageToEditPublicitie'])->name('publicitie.RedirectPageToEditPublicitie');
Route::post('/publicitie/{publicitie}',[PublicitieController::class,'UpdatePublicitie'])->name('publicitie.UpdatePublicitie');
//------------------------------------------------------------------------------------------------
Route::get("/team/create",[TeamController::class,'SendDataTeam'])->name('team.SendDataTeam');
Route::post("/team",[TeamController::class,'ReceiveDataAndCreateTeam'])->name('team.ReceiveDataAndCreateTeam');
Route::get('/team/{team}',[TeamController::class,'DeleteTeam'])->name('team.DeleteTeam');
Route::get("/team/{team}/update",[TeamController::class,'RedirectPageToEditTeam'])->name('team.RedirectPageToEditTeam');
Route::post('/team/{team}',[TeamController::class,'UpdateTeam'])->name('team.UpdateTeam');
//------------------------------------------------------------------------------------------------
Route::get("/forPoint/create",[ForPointController::class,'SendDataForPoint'])->name('forPoint.SendDataForPoint');
Route::post("/forPoint",[ForPointController::class,'ReceiveDataAndCreateForPoint'])->name('forPoint.ReceiveDataAndCreateForPoint');
Route::get('/forPoint/{forPoint}',[ForPointController::class,'DeleteForPoint'])->name('forPoint.DeleteForPoint');
Route::get("/forPoint/{forPoint}/update",[ForPointController::class,'RedirectPageToEditForPoint'])->name('forPoint.RedirectPageToEditForPoint');
Route::post('/forPoint/{forPoint}',[ForPointController::class,'UpdateForPoint'])->name('forPoint.UpdateForPoint');
//------------------------------------------------------------------------------------------------
Route::get("/league/create",[LeagueController::class,'SendDataLeague'])->name('league.SendDataLeague');
Route::post("/league",[LeagueController::class,'ReceiveDataAndCreateLeague'])->name('league.ReceiveDataAndCreateLeague');
Route::get('/league/{league}',[LeagueController::class,'DeleteLeague'])->name('league.DeleteLeague');
Route::get("/league/{league}/update",[LeagueController::class,'RedirectPageToEditLeague'])->name('league.RedirectPageToEditLeague');
Route::post('/league/{league}',[LeagueController::class,'UpdateLeague'])->name('league.UpdateLeague');
//------------------------------------------------------------------------------------------------
Route::get("/record/create",[RecordController::class,'SendDataRecord'])->name('record.SendDataRecord');
Route::post("/record",[RecordController::class,'ReceiveDataAndCreateRecord'])->name('record.ReceiveDataAndCreateRecord');
Route::get('/record/{event}',[RecordController::class,'DeleteEvent'])->name('record.DeleteEvent');
Route::get("/event/{event}/update",[RecordController::class,'RedirectPageToEditEvent'])->name('record.RedirectPageToEditEvent');
Route::post('/event/{event}',[RecordController::class,'UpdateEvent'])->name('record.UpdateEvent');
Route::get("/record/{record}/update",[RecordController::class,'RedirectPageToEditRecord'])->name('record.RedirectPageToEditRecord');
Route::post('/record/{record}',[RecordController::class,'UpdateRecord'])->name('record.UpdateRecord');
//------------------------------------------------------------------------------------------------
Route::get("/forSet/create",[ForSetController::class,'SendDataForSet'])->name('forSet.SendDataForSet');
Route::post("/forSet",[ForSetController::class,'ReceiveDataAndCreateForSet'])->name('forSet.ReceiveDataAndCreateForSet');
Route::get('/forSet/{forSet}',[ForSetController::class,'DeleteForSet'])->name('forSet.DeleteForSet');
Route::get("/forSet/{forSet}/update",[ForSetController::class,'RedirectPageToEditForSet'])->name('forSet.RedirectPageToEditForSet');
Route::post('/forSet/{forSet}',[ForSetController::class,'UpdateForSet'])->name('forSet.UpdateForSet');
Route::get("/set/{forSet}/set/create",[SetController::class,'SendDataSet'])->name('set.SendDataSet');
Route::post("/set/{forSet}/set",[SetController::class,'ReceiveDataAndCreateSet'])->name('set.ReceiveDataAndCreateSet');
Route::get("/set/back",[SetController::class,'RedirectPageCreateForSet'])->name('set.RedirectPageCreateForSet');
Route::get('/set/{set}',[SetController::class,'DeleteSet'])->name('set.DeleteSet');
Route::get("/set/{set}/update",[SetController::class,'RedirectPageToEditSet'])->name('set.RedirectPageToEditSet');
Route::post('/set/{set}',[SetController::class,'UpdateSet'])->name('set.UpdateSet');
//------------------------------------------------------------------------------------------------
Route::get('/',function() {return view('login');});
Route::post("/login",[LoginController::class,'AutenticalUser'])->name('login.AutenticalUser');