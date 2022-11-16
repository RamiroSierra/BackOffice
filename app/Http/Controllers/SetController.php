<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Set;
use App\Models\ForSet;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class SetController extends Controller
{

    public function SendDataSet(ForSet $forSet){
        $sets = DB::table('sets')
        ->join('for_sets','for_sets.id', 'sets.for_set_id')
        ->where('for_sets.id',$forSet->id)
        ->whereNull('sets.deleted_at')
        ->select('puntos_visita','puntos_local','sets.id as id')
        ->get();
        return view('set', compact('sets','forSet'));
    }

    public function RedirectPageCreateForSet(){
        return redirect()->route('forSet.SendDataForSet');
    }

    public function ReceiveDataAndCreateSet (Request $request, $forSet){    
        $validator = Validator::make($request->all(),[
            'puntos_visita' => 'required',
            'puntos_local' => 'required',
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";

        try {
            $set = Set::create([
                'puntos_visita' => $request -> post("puntos_visita"),
                'puntos_local' => $request -> post("puntos_local"),
                'for_set_id' => $forSet
            ]);
            return redirect()->route('set.SendDataSet',$forSet);
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }

    public function DeleteSet ($set){
        Set::find($set)->delete();       
        return back();
    }

    public function RedirectPageToEditSet (Set $set){
        return view('setUpdate', compact('set'));
    }
    
    public function UpdateSet (Request $request,Set $set){
        $forSetID = DB::table('sets')
        ->join('for_sets','for_sets.id', 'sets.for_set_id')
        ->where('sets.id',$set->id)
        ->select('for_sets.id as id')
        ->first();
        $forSet = $forSetID->id;
        $data = $request->only('puntos_visita','puntos_local');

        try {
            $set->update($data);
            return redirect()->route('forSet.RedirectPageToEditForSet',compact('forSet'));
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }
    

}
 
