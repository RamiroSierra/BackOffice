<?php

namespace App\Http\Controllers;
use App\Models\Publicitie;
use App\Models\PublicitieSport;
use App\Models\Sport;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PublicitieController extends Controller
{
    public function SendDataPublicitie(){
        $publicities = Publicitie::all();
        $sports = Sport::all();
        return view('publicitie', compact('publicities','sports'));
    }
    
    public function ReceiveDataAndCreatePublicitie (Request $request,PublicitieSport $publicitieSport){
        $validator = Validator::make($request->all(),[
            'URL' => 'required',
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
        try {
            $publicitie = Publicitie::create([
                'URL' => $request -> post("URL"),
            ]);
            PublicitieSport::create([
                'sport_id' => $request -> post("Sports"),
                'publicitie_id' => $publicitie->id
            ]);
            return redirect()->route('publicitie.SendDataPublicitie');
        }
        catch (QueryException $e){
            return "Algun dato Ingresado es incorrecto";
        }
    }
}
