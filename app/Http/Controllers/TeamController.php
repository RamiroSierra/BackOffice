<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Models\PlayerTeam;
use App\Models\Player;
use App\Models\TechnicalDirector;
use App\Models\LeagueTeam;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function SendDataTeam(){
        $players = Player::all();
        $teams = Team::all();
        $technicals = DB::table('technical_directors')
        ->leftjoin('teams', 'teams.technical_director_id','technical_directors.id')
        ->select('technical_directors.nombre','technical_directors.apellido','technical_directors.id')
        ->whereNull('technical_directors.deleted_at')
        ->whereNull('teams.technical_director_id')
        ->get();
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
            
        try{
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
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }

    public function DeleteTeam ($team){
        $technicalID = DB::table('teams')
        ->join('technical_directors','teams.technical_director_id','technical_directors.id')
        ->select('technical_directors.id as id')
        ->where('teams.id',$team)
        ->first();

        TechnicalDirector::find($technicalID->id)->delete();
        Team::find($team)->delete();
       

        return back();
    }

    public function RedirectPageToEditTeam (Team $team){
        $technicals = DB::table('technical_directors')
        ->leftjoin('teams', 'teams.technical_director_id','technical_directors.id')
        ->select('technical_directors.nombre','technical_directors.apellido','technical_directors.id')
        ->whereNull('teams.technical_director_id')
        ->whereNull('technical_directors.deleted_at')
        ->get();
        $players = Player::all();
        return view('teamUpdate',compact('team','technicals','players'));
    }
    
    public function UpdateTeam (Request $request,Team $team){
        DB::table('player_team')->where('team_id', $team->id)->delete();
        $data = $request->only('nombre','nacimiento','nacionalidad','URL','technical_director_id');
        try {
            $team->update($data);
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
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }

}
