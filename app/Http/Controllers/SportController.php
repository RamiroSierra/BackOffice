<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Sport;
use App\Models\ResultSport;
use App\Models\TypeOfResult;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class SportController extends Controller
{
    public function SendDataSport(){
        $sports = DB::table('sports')
        ->join('result_sport','result_sport.sport_id', 'sports.id')
        ->join('types_of_results','types_of_results.id', 'result_sport.type_of_result_id')
        ->select('sports.nombre','types_of_results.tipo_resultado','sports.id as id')
        ->whereNull('sports.deleted_at')
        ->get();
        return view('sport', compact('sports'));
    }

    public function ReceiveDataAndCreateSport (Request $request,TypeOfResult $result){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'URL' => 'required',
            'typeOfResult' => 'required'
        ]);

        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
            
        try {
            $sport = Sport::create([
                'nombre' => $request -> post("nombre"),
                'URL' => $request -> post("URL"),
            ]);
            if($request->post('typeOfResult') == '1'){
                ResultSport::create([
                    'sport_id' => $sport->id,
                    'type_of_result_id' => '1'
                ]);
                return redirect()->route('sport.SendDataSport');
            }
            if($request->post('typeOfResult') == '2'){
                ResultSport::create([
                    'sport_id' => $sport->id,
                    'type_of_result_id' => '2'
                ]);
                return redirect()->route('sport.SendDataSport');
            }
            ResultSport::create([
                'sport_id' => $sport->id,
                'type_of_result_id' => '3'
            ]);
            return redirect()->route('sport.SendDataSport');
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }

    public function DeleteSport ($sport){
        Sport::find($sport)->delete();
        return back();
    }

    public function RedirectPageToEditSport (Sport $sport){
        return view('sportUpdate',compact('sport'));
    }
    
    public function UpdateSport (Request $request,Sport $sport){
        DB::table('result_sport')->where('sport_id', $sport->id)->delete();

        $data = $request->only('nombre','URL');
        try {
            $sport->update($data);
            if($request->post('typeOfResult') == '1'){
                ResultSport::create([
                    'sport_id' => $sport->id,
                    'type_of_result_id' => '1'
                ]);
                return redirect()->route('sport.SendDataSport');
            }
            if($request->post('typeOfResult') == '2'){
                ResultSport::create([
                    'sport_id' => $sport->id,
                    'type_of_result_id' => '2'
                ]);
                return redirect()->route('sport.SendDataSport');
            }
            ResultSport::create([
                'sport_id' => $sport->id,
                'type_of_result_id' => '3'
            ]);
            return redirect()->route('sport.SendDataSport');
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }

}

