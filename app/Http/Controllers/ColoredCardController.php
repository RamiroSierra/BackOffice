<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ColoredCard;
use Illuminate\Database\Eloquent\SoftDeletes;


class ColoredCardController extends Controller
{
    public function SendDataColoredCard (){
        $cards = ColoredCard::all();
        return view('cardColor', compact('cards'));
    }
    
    public function ReceiveDataAndCreateColoredCard (Request $request){
        $card = ColoredCard::create($request->only('color'));
        return redirect()->route('card.SendDataColoredCard');
    }
    
    public function DeleteColoredCard (ColoredCard $card){
        $card->delete();
        return back();
    }

    public function RedirectPageToEditColoredCard (ColoredCard $card){
        return view('cardColorupdate',compact('card'));
    }

    public function UpdateColoredCard (Request $request,ColoredCard $card){
        $data = $request->only('color');
        $card->update($data);
        return redirect()->route('card.create', $card->id);
    }
} 