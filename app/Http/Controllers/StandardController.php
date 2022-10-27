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
    public function create(){
        $users = User::all();
        $clients = Client::all();
        $sqls = DB::table('users')
        ->join('client_user', 'client_user.user_id',  'users.id')
        ->join('clients', 'client_user.client_id', 'clients.id')
        ->select('clients.nombre as clientN','clients.apellido as clientA','users.name as userN', 'users.email as userE','users.id as id' )
        ->get();
        return view('userStandard', compact('users','clients','sqls'));
    }

    public function keep (Request $request){
        $user = User::create($request->only('name','email') + ['password' => bcrypt($request->input('password')),]);
        $client = Client::create($request->only('nombre','apellido'));
        $external = External::create(['client_id' => $client->id]);
        ClientUser::create(['user_id' => $user->id, 'client_id' => $client->id]);
        Standard::create(['client_id' => $external->client_id]);
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
            'nombre' => 'required',
            'apellido' => 'required'
        ]);

        return redirect()->route('standard.create');
    }

//-----------------------------delete--------------------------
    /*public function delete ($sqls){
        $sqls->delete();
        return back();
    }*/
}