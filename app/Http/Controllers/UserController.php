<?php

namespace App\Http\Controllers;
use Sentinel;
use Illuminate\Http\Request;
use Validator;


class UserController extends Controller
{
    
    protected $signature = 'make:admin';
    public const MAX_NAME=225;
    public const MAX_EMAIL=225;
    public const MAX_PASS=225;
    public const MIN_PASS=6;


    public function login(Request $request){
        $credentials = [
            'email'    => $request->email,
            'password' => $request->pwd,
        ];

        
        $emptyValidation=[
            'email' => "required|max:".self::MAX_EMAIL,
            'password' => "required|min:".self::MIN_PASS."|max:".self::MAX_PASS,

        ];


        $validRequest = Validator::make($request->all(),$emptyValidation);
        $emailValidation = array('email' => 'unique:users|email|required'  );
        $validEmail = Validator::make($request->all(),$emailValidation);

        if($validEmail->fails()){
            return ['response'=>'The email is not valid.'];
        }

        elseif ($validRequest->fails()){
            return['response'=>'Password must be of 6 characters or more.'];
        }else{
            Sentinel::authenticate($credentials);
            return redirect('');
        }

    }

    public function logout(){
        Sentinel::logout();
        return redirect('');
    }

    public function signup(Request $request){

        $credentials = [
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->pwd,
            'r_password' =>$request->rpwd,
        ];

        $emptyValidation=[
            'name' => "required|max:".self::MAX_NAME,
            'email' => "required|max:".self::MAX_EMAIL,
            'password' => "required|min:".self::MIN_PASS."|max:".self::MAX_PASS,
            'r_password' => "required|max:".self::MAX_PASS,
        ];
        $validRequest = Validator::make($credentials,$emptyValidation);



        if(empty($request->name)){
            return ['response'=>'You did not enter a name'];
        }
        $emailValidation = array('email' => 'unique:users|email|required'  );
        $validEmail = Validator::make($request->all(),$emailValidation);

        if($validEmail->fails()){
            return ['response'=>'The email is not valid.'];
        }

        if($request->pwd !==$request->rpwd){
            return['response'=>'Password does not match....'];
        }elseif (strlen($request->pwd)<self::MIN_PASS){
            return['response'=>"Password has to be more than 6 letters"];
        }elseif ($validRequest->fails()){
            return['response'=>'Password must be of 6 characters or more.'];
        }else{
            $user = Sentinel::registerAndActivate($credentials);
            $role = Sentinel::findRoleBySlug('viewer');
            $role->users()->attach($user);
            $this->firstLogin($request->all());
        }

        

    }


    public static function firstLogin($request){
        $credentials = [
            'email'    => $request['email'],
            'password' => $request['pwd'],
        ];

        Sentinel::authenticate($credentials);
        return ['response'=>'Welcome dude'];
    }


}
