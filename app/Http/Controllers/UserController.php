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
use App\Models\Vip;
use App\Models\CardVip;
use App\Models\Card;
use \Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class UserController extends Controller
{
//-----------------------------Create--------------------------
    public function SendDataUser(){
        $standards = DB::table('users')
        ->join('client_user', 'client_user.user_id',  'users.id')
        ->join('clients', 'client_user.client_id', 'clients.id')
        ->join('externals', 'clients.id', 'externals.client_id')
        ->join('standards', 'externals.client_id', 'standards.client_id')
        ->select('clients.nombre as clientN','clients.apellido as clientA',
        'users.name as userN', 'users.email as userE','users.id as id' )
        ->get();
        $vips = DB::table('users')
        ->join('client_user', 'client_user.user_id',  'users.id')
        ->join('clients', 'client_user.client_id', 'clients.id')
        ->join('externals', 'clients.id', 'externals.client_id')
        ->join('vips', 'externals.client_id', 'vips.client_id')
        ->select('clients.nombre as clientN','clients.apellido as clientA','users.name as userN', 'users.email as userE','users.id as id' )
        ->get();
        return view('user', compact('standards', 'vips'));
    }

    public function ReceiveDataAndCreateUser (Request $request){
        $validator = Validator::make($request->all(),[
            'nombre' => 'required',
            'apellido' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";

        try {
            $user = User::create([
                'name' => $request -> post("name"),
                'email' => $request -> post("email"),
                'password' => Hash::make($request -> post("password"))
            ]);
            $client = Client::create([
                'nombre' => $request -> post("name"),
                'apellido' => $request -> post("apellido")
            ]);
            $external = External::create([
                'client_id' => $client->id
            ]);
            ClientUser::create([
                'user_id' => $user->id,
                'client_id' => $client->id
            ]);
            if($request->post('typeOfClient') == '1'){
                Standard::create(['client_id' => $external->client_id]);
                return redirect()->route('user.SendDataUser');
            }
            $vip = Vip::create([
                'client_id' => $external->client_id
            ]);
            return redirect()->route('card.SendDataCard', $vip->client_id);
        }
        catch (QueryException $e){
            return "Algun dato Ingresado es incorrecto";
        }
    }
    
    public function RedirectPageToEditStandard ($standard){
        $oda = DB::table('users')
        ->join('client_user', 'client_user.user_id',  'users.id')
        ->join('clients', 'client_user.client_id', 'clients.id')
        ->join('externals', 'clients.id', 'externals.client_id')
        ->join('standards', 'externals.client_id', 'standards.client_id')
        ->select('clients.nombre as clientN','clients.apellido as clientA',
        'users.name as userN', 'users.email as userE','users.id as id' )
        ->where('standards.client_id',$standard)
        ->get();
        return view('satandardUpdate',compact('oda','standard'));
    } 

    public function UpdateStandard (Request $request,Standard $standard){
        $data = $request->only('nombre','apellido','name','email','password');
        $standard->update($data);
        return redirect()->route('usar.ReceiveDataAndCreateUser', $standard->id);
    } 
}