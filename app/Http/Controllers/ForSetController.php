<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\ForSet;
use App\Models\Event;
use App\Models\EventForSet;
use App\Models\Local;
use App\Models\Visit;
use App\Models\Team;
use App\Models\EventReferee;
use App\Models\Referee;
use App\Models\League;
use App\Models\Set;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ForSetController extends Controller
{
    public function SendDataForSet(){
        $forSets = DB::table('for_sets')
        ->join('event_for_set', 'event_for_set.for_set_id','for_sets.id')
        ->join('events','event_for_set.event_id', 'events.id')
        ->select('for_sets.ganadas_visita','for_sets.ganadas_local','events.fecha')
        ->get();
        $teams = DB::table('teams')
        ->join('league_team', 'league_team.team_id','teams.id')
        ->join('leagues','leagues.id', 'league_team.league_id')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->where('types_of_results.tipo_resultado','Por Sets')
        ->select('teams.nombre','teams.id')
        ->get();
        $referees = Referee::all();
        $leagues = DB::table('leagues')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->where('types_of_results.tipo_resultado','Por Sets')
        ->select('leagues.nombre','leagues.id')
        ->get();
        return view('forSet', compact('forSets','teams','referees','leagues'));
    }

    public function ReceiveDataAndCreateForSet (Request $request){
        $validator = Validator::make($request->all(),[
            'ganadas_visita' => 'required',
            'ganadas_local' => 'required',
            'fecha' => 'required',
            'TeamVist'=> 'required',
            'TeamLocal'=> 'required',
            'seleccionarReferees'=>'required'
        ]);

        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
        
        if ($request -> post("TeamLocal") === $request -> post("TeamVist"))
            return "No Puedes ingresar al mismo equipo como visita y como Local";
    
        try {
            $forSet = ForSet::create([
                'ganadas_visita' => $request -> post("ganadas_visita"),
                'ganadas_local' => $request -> post("ganadas_local"),
            ]);
            $event = Event::create([
                'fecha' => $request -> post("fecha"),
            ]);
            EventForSet::create([
                'event_id' => $event->id,
                'for_set_id' => $forSet->id
            ]);
            Local::create([
                'event_id' => $event->id,
                'team_id' => $request -> post("TeamLocal")
            ]);
            Visit::create([
                'event_id' => $event->id,
                'team_id' => $request -> post("TeamVist")
            ]);
            $seleccions = $request->seleccionarReferees;
            foreach ($seleccions as $seleccion) {
                EventReferee::create([
                    'referee_id' => $seleccion,
                    'event_id' => $event->id
                ]);
            }
            return redirect()->route('set.SendDataSet', $forSet->id);
        }
        catch (QueryException $e){
            return "Algun dato Ingresado es incorrecto";
        }

    }
}
