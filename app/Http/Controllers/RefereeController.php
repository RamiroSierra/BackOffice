<?php

namespace App\Http\Controllers;
use App\Models\Referee;
use Illuminate\Http\Request;

class RefereeController extends Controller
{

    public function SendDataReferee(){
        $referees = Referee::all();
        return view('referee', compact('referees'));
    }

    public function ReceiveDataAndCreateReferee (Request $request){
        $referee = Referee::create($request->only('nombre','apellido'));
        return redirect()->route('referee.SendDataReferee');
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

