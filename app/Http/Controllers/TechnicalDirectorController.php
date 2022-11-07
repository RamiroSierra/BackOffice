<?php

namespace App\Http\Controllers;
use App\Models\TechnicalDirector;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TechnicalDirectorController extends Controller
{

    public function SendDataTechnical(){
        $technicals = TechnicalDirector::all();
        return view('technical', compact('technicals'));
    }

    public function ReceiveDataAndCreateTechnical (Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'apellido' => 'required',
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
        try {
           $technical = TechnicalDirector::create([
                'nombre' => $request -> post("nombre"),
                'apellido' => $request -> post("apellido")
            ]);
            return redirect()->route('technical.SendDataTechnical');
        }
        catch (QueryException $e){
            return "Algun dato Ingresado es incorrecto";
        }
    }

    public function DeleteTechnical (TechnicalDirector $technical){
        $technical->delete();
        return back();
    }

    public function RedirectPageToEditTechnical (TechnicalDirector $technical){
        return view('technicalUpdate',compact('technical'));
    }
    public function UpdateTechnical (Request $request,TechnicalDirector $technical){
        $data = $request->only('nombre','apellido');
        $technical->update($data);
        return redirect()->route('technical.SendDataTechnical', $technical->id);
    }
}
