<?php

namespace App\Http\Controllers;
use App\Models\League;
use App\Models\LeagueSport;
use App\Models\LeagueTeam;
use App\Models\Team;
use App\Models\Sport;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    public function SendDataLeague(){
        $teams = Team::all();
        $leagues = League::all();
        $sports = Sport::all();
        return view('league', compact('teams','leagues','sports'));
    }

    public function ReceiveDataAndCreateLeague (Request $request){
        $league = League::create([
            'nombre' => $request -> post("nombre"),
            'URL' => $request -> post("URL"),
        ]);
        LeagueSport::create([
            'league_id' => $league->id,
            'sport_id' => $request -> post("Sports"),
            ]);
        $seleccions = $request->seleccionarEquipo;
        foreach ($seleccions as $seleccion) {
                LeagueTeam::create([
                'league_id' => $league->id,
                'team_id' => $seleccion,
                ]);
        }
        return redirect()->route('league.SendDataLeague');
    }

}
