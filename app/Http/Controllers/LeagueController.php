<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\League;
use App\Models\LeagueSport;
use App\Models\LeagueTeam;
use App\Models\Team;
use App\Models\Sport;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
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
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'URL' => 'required',
            'seleccionarEquipo' => 'required'
        ]);

        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
            
        try {
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
                        'team_id' => $seleccion
                    ]);
            }
            return redirect()->route('league.SendDataLeague');
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }

    public function DeleteLeague ($league){
        League::find($league)->delete();
        return back();
    }

    public function RedirectPageToEditLeague (League $league){
        $teams = Team::all();
        $sports = Sport::all();
        return view('leagueUpdate',compact('league','teams','sports'));
    }
    
    public function UpdateLeague (Request $request,League $league){
        $data = $request->only('nombre','URL');
        
        DB::table('league_sport')->where('league_id', $league->id)->delete();
        DB::table('league_team')->where('league_id', $league->id)->delete();
        
        try {
            $league->update($data);
            LeagueSport::create([
                'league_id' => $league->id,
                'sport_id' => $request -> post("Sports"),
            ]);
            $seleccions = $request->seleccionarEquipo;
            foreach ($seleccions as $seleccion) {
                    LeagueTeam::create([
                        'league_id' => $league->id,
                        'team_id' => $seleccion
                    ]);
            }
            return redirect()->route('league.SendDataLeague');
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }

}
