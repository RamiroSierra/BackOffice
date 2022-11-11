<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\ForPoint;
use App\Models\Event;
use App\Models\EventForPoint;
use App\Models\Local;
use App\Models\Visit;
use App\Models\Team;
use App\Models\EventReferee;
use App\Models\Referee;
use App\Models\League;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;


class ForPointController extends Controller
{
    public function SendDataForPoint(){
        $forPoints = DB::table('for_points')
        ->join('event_for_point', 'event_for_point.for_point_id','for_points.id')
        ->join('events','event_for_point.event_id', 'events.id')
        ->select('for_points.puntos_visita','for_points.puntos_local','events.fecha')
        ->get();
        $teams = DB::table('teams')
        ->join('league_team', 'league_team.team_id','teams.id')
        ->join('leagues','leagues.id', 'league_team.league_id')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->where('types_of_results.tipo_resultado','Por Puntos')
        ->select('teams.nombre','teams.id')
        ->get();
        $referees = Referee::all();
        $leagues = DB::table('leagues')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->where('types_of_results.tipo_resultado','Por Puntos')
        ->select('leagues.nombre','leagues.id')
        ->get();
        return view('forPoint', compact('forPoints','teams','referees','leagues'));
    }

    public function ReceiveDataAndCreateForPoint (Request $request){
        $validator = Validator::make($request->all(),[
            'puntos_visita' => 'required',
            'puntos_local' => 'required',
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
            $forPoint = ForPoint::create([
                'puntos_visita' => $request -> post("puntos_visita"),
                'puntos_local' => $request -> post("puntos_local"),
            ]);
            $event = Event::create([
                'fecha' => $request -> post("fecha"),
            ]);
            EventForPoint::create([
                'event_id' => $event->id,
                'for_point_id' => $forPoint->id
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
            return redirect()->route('forPoint.SendDataForPoint');
        }
        catch (QueryException $e){
            return "Algun dato Ingresado es incorrecto";
        }

    }
    
}