<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ColoredCardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StandardController;

Route::get("/CardColor/create",[ColoredCardController::class,'create'])->name('card.create');
Route::post("/CardColor",[ColoredCardController::class,'keep'])->name('card.keep');


Route::get("/CardColor/{card}",[ColoredCardController::class,'delete'])->name('card.delete');



Route::get("/CardColor/{card}/update",[ColoredCardController::class,'edit'])->name('card.edit');
Route::post('/CardColor/{card}',[ColoredCardController::class,'update'])->name('card.update');

Route::get("/CardColor",[ColoredCardController::class,'list']);

//-----------------------------------------------------------------------
Route::post("/CreateStandard",[StandardController::class,'create']);
Route::get("/CreateStandard",[StandardController::class,'lista']);
