<?php

namespace App\Http\Controllers;
use App\Models\Referee;
use Illuminate\Http\Request;

class RefereeController extends Controller
{
//-----------------------------Create-----------------------------
    public function create(){
        $referees = Referee::all();
        return view('referee', compact('referees'));
    }

    public function keep (Request $request){
        $referee = Referee::create($request->only('nombre','apellido'));
        return redirect()->route('referee.create');
    }
//-----------------------------Delete-----------------------------
    public function delete (Referee $referee){
        $referee->delete();
        return back();
    }
//-----------------------------Delete-----------------------------
    public function edit(Referee $referee){
        return view('refereeUpdate',compact('referee'));
    }
    public function update (Request $request,Referee $referee){
        $data = $request->only('nombre','apellido');
        $referee->update($data);
        return redirect()->route('referee.create', $referee->id);
    }
}

