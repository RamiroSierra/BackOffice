<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function AutenticalUser (Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator -> fails())
            return "Todos los campos deben de estar llenos";
        $user = $request->only('name','password','email');
        
        $Admin = DB::table('administrators_of_applications')
        ->join('clients','administrators_of_applications.client_id','clients.id')
        ->join('client_user','clients.id','client_user.client_id')
        ->join('users','client_user.user_id','users.id')
        ->select('administrators_of_applications.client_id as id')
        ->where([
            ['users.name', $request -> post("name") ],
            ['users.email', $request -> post("email") ]
        ])
        ->select('administrators_of_applications.id as id')
        ->first();

        if(!Auth::attempt($user))
            return view('login');
        
        if($Admin!=NULL)
            return redirect()->route('player.SendDataPlayer');
            
    }

}
