<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Record;
use App\Models\Event;
use App\Models\EventRecord;
use App\Models\Local;
use App\Models\Visit;
use App\Models\Team;
use App\Models\EventReferee;
use App\Models\Referee;
use App\Models\League;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function SendDataRecord(){
        $records = DB::table('records')
        ->join('event_record', 'event_record.record_id','records.id')
        ->join('events','event_record.event_id', 'events.id')
        ->select('unidad_de_medida','puntaje')
        ->get();
        $teams = DB::table('teams')
        ->join('league_team', 'league_team.team_id','teams.id')
        ->join('leagues','leagues.id', 'league_team.league_id')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->where('types_of_results.tipo_resultado','Por Marca')
        ->select('teams.nombre','teams.id')
        ->get();
        $referees = Referee::all();
        $leagues = DB::table('leagues')
        ->join('league_sport','league_sport.league_id', 'leagues.id')
        ->join('sports','sports.id', 'league_sport.sport_id')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->where('types_of_results.tipo_resultado','Por Marca')
        ->select('leagues.nombre','leagues.id')
        ->get();
        return view('record', compact('records','teams','referees','leagues'));
    }

    public function ReceiveDataAndCreateRecord (Request $request){
        $validator = Validator::make($request->all(),[
            'unidad_de_medida' => 'required',
            'puntajeVisita' => 'required',
            'puntajeLocal' => 'required',
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
            $record = Record::create([
                'unidad_de_medida' => $request -> post("unidad_de_medida"),
                'puntaje' => $request -> post("puntajeVisita"),
            ]);
            $record2 = Record::create([
                'unidad_de_medida' => $request -> post("unidad_de_medida"),
                'puntaje' => $request -> post("puntajeLocal"),
            ]);
            $event = Event::create([
                'fecha' => $request -> post("fecha"),
            ]);
            EventRecord::create([
                'event_id' => $event->id,
                'record_id' => $record->id
            ]);
            EventRecord::create([
                'event_id' => $event->id,
                'record_id' => $record2->id
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
