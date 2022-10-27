<?php

namespace App\Http\Controllers;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerController extends Controller
{
//-----------------------------Create-----------------------------
    public function create(){
        $players = Player::all();
        return view('player', compact('players'));
    }

    public function keep (Request $request){
        $player = Player::create($request->only('edad','nombre','apellido','nacionalidad'));
        return redirect()->route('player.create');
    }
//-----------------------------Delete-----------------------------
    public function delete (Player $player){
        $player->delete();
        return back();
    }
//-----------------------------Delete-----------------------------
    public function edit(Player $player){
        return view('playerUpdate',compact('player'));
    }
    public function update (Request $request,Player $player){
        $data = $request->only('edad','nombre','apellido','nacionalidad');
        $player->update($data);
        return redirect()->route('player.create', $player->id);
    }
}
