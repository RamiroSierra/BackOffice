<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlayerController extends Controller
{
    public function SendDataPlayer(){
        $players = Player::all();
        return view('player', compact('players'));
    }

    public function ReceiveDataAndCreatePlayer (Request $request){
        $validator = Validator::make($request->all(),[
            'edad' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'nacionalidad' => 'required'
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
        try {
            $player = Player::create([
                'edad' => $request -> post("edad"),
                'nombre' => $request -> post("nombre"),
                'apellido' => $request -> post("apellido"),
                'nacionalidad' => $request -> post("nacionalidad")
            ]);
            return redirect()->route('player.SendDataPlayer');
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }

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
