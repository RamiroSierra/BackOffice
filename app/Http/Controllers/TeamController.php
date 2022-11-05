<?php

namespace App\Http\Controllers;
use App\Models\Team;
use App\Models\PlayerTeam;
use App\Models\Player;
use App\Models\TechnicalDirector;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function SendDataTeam(){
        $players = Player::all();
        $teams = Team::all();
        $technicals = TechnicalDirector::all();
        return view('team', compact('teams','technicals','players'));
    }

    public function ReceiveDataAndCreateTeam (Request $request){
        $team = Team::create([
            'nombre' => $request -> post("nombre"),
            'nacimiento' => $request -> post("nacimiento"),
            'nacionalidad' => $request -> post("nacionalidad"),
            'URL' => $request -> post("URL"),
            'technical_director_id' => $request -> post("Technicals"),
        ]);
        $seleccions = $request->seleccionarJugadores;
        foreach ($seleccions as $seleccion) {
            PlayerTeam::create([
            'team_id' => $team->id,
            'player_id' => $seleccion,
            ]);
        } 
        return redirect()->route('team.SendDataTeam');
    }
    
    
    
    
    // public function DeleteTeam (Team $team){
    //     $team->delete();
    //     return back();
    // }

    // public function RedirectPageToEditTeam (Team $team){
    //     return view('UpdateTeam',compact('team'));
    // }
    // public function UpdateTeam (Request $request,Team $team){
    //     $data = $request->only('nombre','nacimiento','nacionalidad','URL');
    //     $team->update($data);
    //     return redirect()->route('Team.SendDataTeam', $team->id);
    // }
}
