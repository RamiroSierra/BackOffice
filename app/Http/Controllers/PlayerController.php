<?php

namespace App\Http\Controllers;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerController extends Controller
{
    public function SendDataPlayer(){
        $players = Player::all();
        return view('player', compact('players'));
    }

    public function ReceiveDataAndCreatePlayer (Request $request){
        $player = Player::create($request->only('edad','nombre','apellido','nacionalidad'));
        return redirect()->route('player.SendDataPlayer');
    }

    public function DeletePlayer (Player $player){
        $player->delete();
        return back();
    }

    public function RedirectPageToEditPlayer (Player $player){
        return view('playerUpdate',compact('player'));
    }
    public function UpdatePlayer (Request $request,Player $player){
        $data = $request->only('edad','nombre','apellido','nacionalidad');
        $player->update($data);
        return redirect()->route('player.SendDataPlayer', $player->id);
    }
}
