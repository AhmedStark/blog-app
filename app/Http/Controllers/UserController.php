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
    
    /*public const MAX_NAME=225;
    public const MAX_EMAIL=225;
    public const MAX_PASS=225;
    public const MIN_PASS=6;*/

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

        
        /*$emptyValidation=[
            'email' => "required",
            'pwd' => "required",

        ];

        $validRequest = Validator::make($request->all(),$emptyValidation);
        $emailValidation = array('email' => 'email|required'  );
        $validEmail = Validator::make($request->all(),$emailValidation);

        if($validEmail->fails()){
            return redirect('/login')->with(['response'=>'<div class="error--text">The email is not valid.</div>']);
        }

        elseif ($validRequest->fails()){
            return redirect('/login')->with(['response'=>'<div class="error--text">One of the fields was empty</dib>']);
        }*/
        //else{
            if(!Sentinel::authenticate($credentials)){
                return redirect('/login')->with(['response'=>'<div class="error--text">User email or password was not right.</div>']);
            }
            Sentinel::authenticate($credentials);
            return redirect('/');
        //}

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

        /*$emptyValidation=[
            'name' => "required|max:".self::MAX_NAME,
            'email' => "unique:users|email|required|max:".self::MAX_EMAIL,
            'password' => "required|min:".self::MIN_PASS."|max:".self::MAX_PASS,
            'r_password' => "required|max:".self::MAX_PASS,
        ];
        $validRequest = Validator::make($credentials,$emptyValidation);



        if(empty($request->name)){
            return redirect('/signup')->with(['response'=>'You did not enter a name']);
        }
        $emailValidation = array('email' => 'unique:users|email|required'  );
        $validEmail = Validator::make($request->all(),$emailValidation);

        if($validEmail->fails()){
            return redirect('/signup')->with(['response'=>'<div class="error--text">The email is not valid.</div>']);
        }

        if($request->pwd !==$request->rpwd){
            return redirect()->back()->with(['response'=>'<div class="error--text">Password does not match....</div>']);
        }elseif (strlen($request->pwd)<self::MIN_PASS){
            return redirect('/signup')->with(['response'=>"<div class=\"error--text\">Password has to be more than 6 letters</div>"]);
        }elseif ($validRequest->fails()){
            return redirect('/signup')->with(['response'=>'<div class="error--text">Password must be of 6 characters or more.</div>']);
        }else{*/
            $user = Sentinel::registerAndActivate($credentials);
            $role = Sentinel::findRoleBySlug('viewer');
            $role->users()->attach($user);
            $user->name= $request->name;
            $user->save();
            return $this->firstLogin($request);
            
        //}

        

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
