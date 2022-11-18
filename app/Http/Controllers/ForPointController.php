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
        ->select('for_points.puntos_visita','for_points.puntos_local','events.fecha','for_points.id as id')
        ->whereNull('for_points.deleted_at')
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
        ->whereNull('teams.deleted_at')
        ->get();
        $referees = Referee::all();
        $leagues = DB::table('leagues')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->where('types_of_results.tipo_resultado','Por Puntos')
        ->select('leagues.nombre','leagues.id')
        ->whereNull('leagues.deleted_at')
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
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }

    public function DeleteForPoint ($forPoint){
        $event = DB::table('for_points')
        ->join('event_for_point', 'event_for_point.for_point_id','for_points.id')
        ->join('events','event_for_point.event_id', 'events.id')
        ->select('events.id as id')
        ->where('for_points.id',$forPoint)
        ->first();
        Event::find($event->id)->delete();
        ForPoint::find($forPoint)->delete();
        return back();
    }

    public function RedirectPageToEditForPoint (ForPoint $forPoint){
        $forPoint = DB::table('for_points')
        ->join('event_for_point', 'event_for_point.for_point_id','for_points.id')
        ->join('events','event_for_point.event_id', 'events.id')
        ->select('for_points.puntos_visita','for_points.puntos_local','events.fecha','for_points.id as id')
        ->where('for_points.id',$forPoint->id)
        ->whereNull('for_points.deleted_at')
        ->first();
        $teams = DB::table('teams')
        ->join('league_team', 'league_team.team_id','teams.id')
        ->join('leagues','leagues.id', 'league_team.league_id')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->where('types_of_results.tipo_resultado','Por Puntos')
        ->select('teams.nombre','teams.id')
        ->whereNull('teams.deleted_at')
        ->get();
        $referees = Referee::all();
        $leagues = DB::table('leagues')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->where('types_of_results.tipo_resultado','Por Puntos')
        ->select('leagues.nombre','leagues.id')
        ->whereNull('leagues.deleted_at')
        ->get();
        return view('forPointUpdate', compact('forPoint','teams','referees','leagues'));
    }
    
    public function UpdateForPoint (Request $request,ForPoint $forPoint){
        $data1 = $request->only('puntos_visita','puntos_local');
        $data2 = $request->only('fecha');
        $eventId = DB::table('for_points')
        ->join('event_for_point', 'event_for_point.for_point_id','for_points.id')
        ->join('events','event_for_point.event_id', 'events.id')
        ->where('for_points.id',$forPoint->id)
        ->select('events.id as id')
        ->first();
        DB::table('locals')->where('event_id', $eventId->id)->delete();
        DB::table('visits')->where('event_id', $eventId->id)->delete();
        DB::table('event_referee')->where('event_id', $eventId->id)->delete();

        try {
            $forPoint->update($data1);
            $event = Event::find($eventId->id);
            $event->update($data2);
        
            Local::create([
                'event_id' => $eventId->id,
                'team_id' => $request -> post("TeamLocal")
            ]);
            Visit::create([
                'event_id' => $eventId->id,
                'team_id' => $request -> post("TeamVist")
            ]);
            $seleccions = $request->seleccionarReferees;
            foreach ($seleccions as $seleccion) {
                EventReferee::create([
                    'referee_id' => $seleccion,
                    'event_id' => $eventId->id
                ]);
            }
            return redirect()->route('forPoint.SendDataForPoint');
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }
}