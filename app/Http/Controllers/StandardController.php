<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Client;
use App\Models\ClientUser;
use App\Models\External;
use App\Models\Standard;
use Illuminate\Http\Request;

class StandardController extends Controller
{
//-----------------------------Create--------------------------
    public function create(Request $request){
        $validation = $this -> takeDataCreate($request);

        if($validation !== "true")
            return $validation;
        $this -> createStandard($request);
        return back();
    }

    private function takeDataCreate($request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'apellido' => 'required',
            'alias' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        if($validator -> fails())
            return 'Todas las casillas deben estar llenas';

        return "true";
    }

    private function createStandard ($request){
        $user = User::create([
            'name' => $request -> post("alias"),
            'email' => $request -> post("email"),
            'password' => Hash::make($request -> post("password"))
        ]);
        $client = Client::create([
            'nombre' => $request -> post("nombre"),
            'apellido' => $request -> post("apellido")
        ]);
         ClientUser::create([
            'user_id' => $user->id,
            'client_id' => $client->id
        ]);
        $external = External::create([
            'client_id' => $client->id
        ]);
        Standard::create([
            'client_id' => $external->client_id
        ]);
    }

    public function lista(){
        $sql = DB::table('users')
        ->join('client_user', 'client_user.user_id',  'users.id')
        ->join('clients', 'client_user.client_id', 'clients.id')
        ->select('clients.nombre as clientN','clients.apellido as clientA','users.name as userN', 'users.email as userE')
        ->get();
        return view('prueba', [
            'sqls' => $sql
        ]);
    }
//-----------------------------update--------------------------

}