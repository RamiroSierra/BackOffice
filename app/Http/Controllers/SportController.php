<?php

namespace App\Http\Controllers;
use App\Models\Sport;
use App\Models\ResultSport;
use App\Models\TypeOfResult;
use Illuminate\Http\Request;

class SportController extends Controller
{
//-----------------------------Create-----------------------------
    public function SendDataSport(){
        $sports = Sport::all();
        $results = TypeOfResult::all();
        return view('sport', compact('sports','results'));
    }
    public function ReceiveDataAndCreateSport (Request $request,TypeOfResult $result){
        $sport = Sport::create($request->only('nombre','URL'));
        if($request->post('typeOfResult') == '1'){
            ResultSport::create([
                'sport_id' => $sport->id,
                'type_of_result_id' => '1'
            ]);
            return redirect()->route('sport.SendDataSport');
        }
        if($request->post('typeOfResult') == '2'){
            ResultSport::create([
                'sport_id' => $sport->id,
                'type_of_result_id' => '2'
            ]);
            return redirect()->route('sport.SendDataSport');
        }
        ResultSport::create([
            'sport_id' => $sport->id,
            'type_of_result_id' => '3'
        ]);
        return redirect()->route('sport.SendDataSport');
    }

//-----------------------------Delete-----------------------------
    // public function delete (Sport $sport){
    //     $sport->delete();
    //     return back();
    // }
//-----------------------------Delete-----------------------------
    // public function edit(Sport $sport){
    //     return view('sportUpdate',compact('sport'));
    // }
    // public function update (Request $request,Sport $sport){
    //     $data = $request->only('nombre','URL');
    //     $sport->update($data);
    //     return redirect()->route('sport.create', $sport->id);
    // }
}
