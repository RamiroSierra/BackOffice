<?php

namespace App\Http\Controllers;
use App\Models\Publicitie;
use App\Models\PublicitieSport;
use App\Models\Sport;
use Illuminate\Http\Request;

class PublicitieController extends Controller
{
    public function SendDataPublicitie(){
        $publicities = Publicitie::all();
        $sports = Sport::all();
        return view('publicitie', compact('publicities','sports'));
    }
    
    public function ReceiveDataAndCreatePublicitie (Request $request,PublicitieSport $publicitieSport){
        $publicitie = Publicitie::create($request->only('URL'));
        $sport = $request->post('Sports');
        PublicitieSport::create([
            'sport_id' => $sport,
            'publicitie_id' => $publicitie->id
        ]);
        return redirect()->route('publicitie.SendDataPublicitie');
        
    }
}
