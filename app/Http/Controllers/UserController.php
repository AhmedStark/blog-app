<?php

namespace App\Http\Controllers;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignUpRequest;
use Validator;
use App\Social;


class UserController extends Controller
{
    
    

    public function getUserDetails(){
        if(Sentinel::check()){
            $user = Sentinel::getUser();
            return ['logged_in'=>true,"admin"=>$user->inRole('admin')];
        }
        return ['logged_in'=>false,"admin"=>false];
    }

    public function login(LoginRequest $request){
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        
        
        if(!Sentinel::authenticate($credentials)){
            return redirect('/login')->with(['response'=>'<div class="error--text">User email or password was not right.</div>']);
        }
        Sentinel::authenticate($credentials);
        return redirect('/');
        

    }

    public function logout(){
        Sentinel::logout();
        return redirect('');
    }

    public function signup(SignUpRequest $request){

        $credentials = [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->password,
            'r_password' =>$request->repeat_password,
        ];
        
        $user = Sentinel::registerAndActivate($credentials);
        $role = Sentinel::findRoleBySlug('viewer');
        $role->users()->attach($user);
        $user->name= $request->name;
        $user->save();
        return $this->firstLogin($request);
            
        

        

    }


    public static function firstLogin(Request $request){
        $credentials = [
            'email'    => $request['email'],
            'password' => $request['password'],
        ];
        Sentinel::authenticate($credentials);
        return redirect('/')->with(['response'=>'Welcome dude']);
    }

    
    public function loginView()
    {
        return view('login');
    }

    public function signupView()
    {
        return view('create-user');
    }

}
