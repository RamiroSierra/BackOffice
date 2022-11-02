<?php

namespace App\Http\Controllers;
use App\Models\TechnicalDirector;
use Illuminate\Http\Request;

class TechnicalDirectorController extends Controller
{

    public function SendDataTechnical(){
        $technicals = TechnicalDirector::all();
        return view('technical', compact('technicals'));
    }

    public function ReceiveDataAndCreateTechnical (Request $request){
        $technical = TechnicalDirector::create($request->only('nombre','apellido'));
        return redirect()->route('technical.SendDataTechnical');
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
