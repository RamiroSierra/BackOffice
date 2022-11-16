<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\CardVip;
use App\Models\Card;
use App\Models\Vip;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function SendDataCard($vip){
        $cards = Card::all();
        return view('card', compact('cards','vip'));
    }

    public function ReceiveDataAndCreateCard (Request $request, $vip){
        $validator = Validator::make($request->all(),[
            'nombre_titular' => 'required',
            'ci_titular' => 'required',
            'fecha_ven' => 'required',
            'codigo' => 'required|min:3',
            'numero' => 'required',
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";

        try {
            $card = Card::create([
                'nombre_titular' => $request -> post("nombre_titular"),
                'ci_titular' => $request -> post("ci_titular"),
                'fecha_ven' => $request -> post("fecha_ven"),
                'codigo' => $request -> post("codigo"),
                'numero' => $request -> post("numero"),
            ]);
            CardVip::create([
                'card_id' => $card->id,
                'client_id' => $vip
            ]);
            return redirect()->route('user.SendDataUser');
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";

        }
    }
}
