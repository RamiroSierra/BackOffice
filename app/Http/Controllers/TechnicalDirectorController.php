<?php

namespace App\Http\Controllers;
use App\Models\TechnicalDirector;
use Illuminate\Http\Request;

class TechnicalDirectorController extends Controller
{
//-----------------------------Create-----------------------------
    public function create(){
        $technicals = TechnicalDirector::all();
        return view('technical', compact('technicals'));
    }

    public function keep (Request $request){
        $technical = TechnicalDirector::create($request->only('nombre','apellido'));
        return redirect()->route('technical.create');
    }
//-----------------------------Delete-----------------------------
    public function delete (TechnicalDirector $technical){
        $technical->delete();
        return back();
    }
//-----------------------------Delete-----------------------------
    public function edit(TechnicalDirector $technical){
        return view('technicalUpdate',compact('technical'));
    }
    public function update (Request $request,TechnicalDirector $technical){
        $data = $request->only('nombre','apellido');
        $technical->update($data);
        return redirect()->route('technical.create', $technical->id);
    }
}
