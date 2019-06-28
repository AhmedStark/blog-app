<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Validator;
use Sentinel;
class MakeAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';
    public const MAX_NAME=225;
    public const MAX_EMAIL=225;
    public const MAX_PASS=225;
    public const MIN_PASS=6;


    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates Admin user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(100);
        $request = [];
        $emptyValidation=[
            'name' => "required|max:".self::MAX_NAME,
            'email' => "required|max:".self::MAX_EMAIL,
            'password' => "required|min:6|max:".self::MAX_PASS,
            'r_password' => "required|max:".self::MAX_PASS,
        ];
        $emailValidation = array('email' => 'unique:users|email|required'  );
        $request['email'] = $this->ask('Please enter your email (Has to be an active email)');
        $validEmail = Validator::make($request,$emailValidation);
        if($validEmail->fails()){
            $this->warn('This email is not valid');
            return;
        }
        $request['name'] = $this->ask('Please enter your full name');
        if(empty($request['name'])){
            $this->warn('This name is not valid');
            return;
        }
        $request['password'] = $this->secret('Write a password (Has to be more than 6 letters)');
        $request['r_password'] = $this->secret('repeat password ');
        $validRequest = Validator::make($request,$emptyValidation);
        
        if($request['password']!==$request['r_password']){
            $this->warn('Password does not match....');
        }elseif (strlen($request['password']<slef::MIN_PASS)){
            $this->warn('Password has to be more than 6 letters');
        }elseif ($validRequest->fails()){
            $this->warn('Password must be of 6 characters or more.');
        }else{
            $user = Sentinel::registerAndActivate($request);
            $user->name = $request['name'];
            $user->save();
            $role = Sentinel::findRoleBySlug('admin');
            $role->users()->attach($user);
            $this->info("\n\nUser is registerd!");
        }

    }
}
