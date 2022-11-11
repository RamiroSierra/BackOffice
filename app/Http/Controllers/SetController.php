<?php

namespace App\Http\Controllers;
use App\Models\Set;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SetController extends Controller
{

    public function SendDataSet($forSet){
        $sets = Set::all();
        return view('set', compact('sets','forSet'));
    }

    public function RedirectPageCreateForSet(){
        return redirect()->route('forSet.SendDataForSet');
    }

    public function ReceiveDataAndCreateSet (Request $request, $forSet){    
        $validator = Validator::make($request->all(),[
            'puntos_visita' => 'required',
            'puntos_local' => 'required',
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";

        try {
            $set = Set::create([
                'puntos_visita' => $request -> post("puntos_visita"),
                'puntos_local' => $request -> post("puntos_local"),
                'for_set_id' => $forSet
            ]);
            return redirect()->route('set.SendDataSet',$forSet);
        }
        catch (QueryException $e){
            return "Algun dato Ingresado es incorrecto";
        }
    }
}
 
