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
    public function SendDataUser(){
        $standards = DB::table('users')
        ->join('client_user', 'client_user.user_id',  'users.id')
        ->join('clients', 'client_user.client_id', 'clients.id')
        ->join('externals', 'clients.id', 'externals.client_id')
        ->join('standards', 'externals.client_id', 'standards.client_id')
        ->select('clients.nombre as clientN','clients.apellido as clientA','users.name as userN', 'users.email as userE','users.id as id' )
        ->whereNull('users.deleted_at')
        ->get();
        $vips = DB::table('users')
        ->join('client_user', 'client_user.user_id',  'users.id')
        ->join('clients', 'client_user.client_id', 'clients.id')
        ->join('externals', 'clients.id', 'externals.client_id')
        ->join('vips', 'externals.client_id', 'vips.client_id')
        ->select('clients.nombre as clientN','clients.apellido as clientA','users.name as userN', 'users.email as userE','users.id as id' )
        ->whereNull('users.deleted_at')
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
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }
    
    public function DeleteStandardUser ($standard){
        User::find($standard)->delete();
        return back();
    }

    public function DeleteVipUser ($vip){
        User::find($vip)->delete();
        return back();
    }

    public function RedirectPageToEditUser (User $user){
        $userr = DB::table('users')
        ->join('client_user', 'client_user.user_id',  'users.id')
        ->join('clients', 'client_user.client_id', 'clients.id')
        ->select('clients.nombre as clientN','clients.apellido as clientA','users.name as userN', 'users.email as userE','users.id as id')
        ->where('users.id',$user->id)
        ->whereNull('users.deleted_at')
        ->first();
        return view('userUpdate',compact('userr'));
    }
    
    public function UpdateUser (Request $request,User $userr,Client $client){
        $data1 = $request->only('name','email');
        $data2 = $request->only('nombre','apellido');
        $clientId = DB::table('users')
            ->join('client_user', 'client_user.user_id',  'users.id')
            ->join('clients', 'client_user.client_id', 'clients.id')
            ->select('clients.id as id')
            ->where('users.id',$userr->id)
            ->first();
        
        DB::table('standards')->where('client_id', $clientId->id)->delete();
        DB::table('card_vip')->where('client_id', $clientId->id)->delete();
        DB::table('vips')->where('client_id', $clientId->id)->delete();
        
        try {
            $userr->update($data1);
            $client = Client::find($clientId->id);
            $client->update($data2);
        
            if($request->post('typeOfClient') == '1'){
                Standard::create(['client_id' => $clientId->id]);
                return redirect()->route('user.SendDataUser');
            }
            $vip = Vip::create(['client_id' => $clientId->id]);
            return redirect()->route('card.SendDataCard', $vip->client_id);
        }
        catch (QueryException $e){
            DB::rollBack();
            return "Algun dato Ingresado es incorrecto";
        }
    }
}