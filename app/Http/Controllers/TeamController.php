<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\PlayerTeam;
use App\Models\Player;
use App\Models\TechnicalDirector;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function SendDataTeam(){
        $players = Player::all();
        $teams = DB::table('teams')
        ->join('league_team', 'league_team.team_id','teams.id')
        ->join('leagues','leagues.id', 'league_team.league_id')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->select('teams.nombre','types_of_results.tipo_resultado')
        ->get();
        $technicals = DB::table('technical_directors')
        ->leftjoin('teams', 'teams.technical_director_id','technical_directors.id')
        ->select('technical_directors.nombre','technical_directors.apellido','technical_directors.id')
        ->whereNull('teams.technical_director_id')
        ->get();
        TechnicalDirector::all();
        return view('team', compact('teams','technicals','players'));
    }

    public function ReceiveDataAndCreateTeam (Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'nacimiento' => 'required',
            'nacionalidad' => 'required',
            'URL' => 'required',
        ]);

        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
            
        try {
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
        catch (QueryException $e){
            return "Algun dato Ingresado es incorrecto";
        }
        
    }
}
