<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Publicitie;
use App\Models\PublicitieSport;
use App\Models\Sport;
use Illuminate\Support\Facades\Validator;
use \Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class PublicitieController extends Controller
{
    public function SendDataPublicitie(){
        $publicities = DB::table('publicities')
        ->join('publicitie_sport','publicitie_sport.publicitie_id','publicities.id')
        ->join('sports','publicitie_sport.sport_id','sports.id')
        ->select('sports.nombre','publicities.URL', 'publicities.id as id')
        ->whereNull('publicities.deleted_at')
        ->get();
        $sports = Sport::all();
        return view('publicitie', compact('publicities','sports'));
    }
    
    public function ReceiveDataAndCreatePublicitie (Request $request,PublicitieSport $publicitieSport){
        $validator = Validator::make($request->all(),[
            'URL' => 'required',
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
        try {
            $publicitie = Publicitie::create([
                'URL' => $request -> post("URL"),
            ]);
            PublicitieSport::create([
                'sport_id' => $request -> post("Sports"),
                'publicitie_id' => $publicitie->id
            ]);
            return redirect()->route('publicitie.SendDataPublicitie');
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }

    } 
    
    public function DeletePublicitie ($publicitie){
        Publicitie::find($publicitie)->delete();
        return back();
    }

    public function RedirectPageToEditPublicitie (Publicitie $publicitie){
        $sports = Sport::all();
        return view('PublicitieUpdate',compact('publicitie','sports'));
    }
    
    public function UpdatePublicitie (Request $request,Publicitie $publicitie){
        $data = $request->only('URL');
        DB::table('publicitie_sport')->where('publicitie_id', $publicitie->id)->delete();

        try {
            $publicitie->update($data);

            PublicitieSport::create([
                'sport_id' => $request -> post("Sports"),
                'publicitie_id' => $publicitie->id
            ]);
            return redirect()->route('publicitie.SendDataPublicitie');
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }

    }

        
}
