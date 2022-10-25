<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ColoredCard;
use Illuminate\Database\Eloquent\SoftDeletes;


class ColoredCardController extends Controller
{
//-----------------------------Create-----------------------------
    public function create(){
        $cards = ColoredCard::all();
        return view('cardColor', compact('cards'));
    }
    
    public function keep (Request $request){
        $card = ColoredCard::create($request->only('color'));
        return redirect()->route('card.create');
    }
//-----------------------------delete-----------------------------
    public function delete (ColoredCard $card){
        $card->delete();
        return back();
    }
//-----------------------------update-----------------------------
    public function edit(ColoredCard $card){
        return view('cardColorUpdate',compact('card'));
    }
    public function update (Request $request,ColoredCard $card){
        $data = $request->only('color');
        $card->update($data);
        return redirect()->route('card.create', $card->id);
    }
} 