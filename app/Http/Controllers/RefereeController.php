<?php

namespace App\Http\Controllers;
use App\Models\Referee;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RefereeController extends Controller
{

    public function SendDataReferee(){
        $referees = Referee::all();
        return view('referee', compact('referees'));
    }

    public function ReceiveDataAndCreateReferee (Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'apellido' => 'required',
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
        try {
           $referee = Referee::create([
                'nombre' => $request -> post("nombre"),
                'apellido' => $request -> post("apellido")
            ]);
            return redirect()->route('referee.SendDataReferee');
        }
        catch (QueryException $e){
            return "Algun dato Ingresado es incorrecto";
        }
    }

    public function DeleteReferee (Referee $referee){
        $referee->delete();
        return back();
    }

    public function RedirectPageToEditReferee (Referee $referee){
        return view('refereeUpdate',compact('referee'));
    }
    public function UpdateReferee (Request $request,Referee $referee){
        $data = $request->only('nombre','apellido');
        $referee->update($data);
        return redirect()->route('referee.SendDataReferee', $referee->id);
    }
}

