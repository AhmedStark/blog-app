<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Support\Facades\DB;
class AdminCreateCommandTest extends TestCase
{
    public const SUCCESS=0;
    public const EMAIL_FAIL=1;
    public const NAME_FAIL=2;
    public const PASSWORD_LENGTH_FAIL=3;
    public const PASSWORD_VERFICATION_FAIL=4;
    public const SUCCESS_MESSAGE="\n\nUser is registerd!";
    public const EMAIL_FAIL_MESSAGE="This email is not valid";
    public const NAME_FAIL_MESSAGE="This name is not valid";
    public const PASSWORD_LENGTH_FAIL_MESSAGE="Password has to be more than 6 letters";
    public const PASSWORD_VERFICATION_FAIL_MESSAGE="Password does not match....";
    private $testCases =[
        [
            "email"=>"example@exmple.co",
            "name"=>"example",
            "password"=>"123456",
            "repeatPassword"=>"123456",
            "status"=>self::SUCCESS
        ],
        [
            "email"=>"example",
            "name"=>"example",
            "password"=>"123456",
            "repeatPassword"=>"123456",
            "status"=>self::EMAIL_FAIL
        ],
        [
            "email"=>"example@example.com",
            "name"=>"example",
            "password"=>"1234",
            "repeatPassword"=>"1234",
            "status"=>self::PASSWORD_LENGTH_FAIL,
        ],
    ];
    public function testAdminCreateCommand()
    {
        foreach($this->testCases as $testCase){
            $command = $this->artisan('make:admin');
            $command->expectsQuestion("Please enter your email (Has to be an active email)",$testCase['email']);
            if($testCase['status']==self::EMAIL_FAIL){
                $command->expectsOutput(self::EMAIL_FAIL_MESSAGE);
                continue;
                
            }
            $command->expectsQuestion("Please enter your full name",$testCase['name']);
            if($testCase['status']==self::NAME_FAIL){
                $command->expectsOutput(self::NAME_FAIL_MESSAGE);
                continue;
            }
            
            $command->expectsQuestion("Write a password (Has to be more than 6 letters)",$testCase['password']);

            $command->expectsQuestion("repeat password ",$testCase['repeatPassword']);
            if($testCase['status']==self::PASSWORD_LENGTH_FAIL){
                $command->expectsOutput(self::PASSWORD_LENGTH_FAIL_MESSAGE);
                continue;
                
            }
            if($testCase['status']==self::PASSWORD_VERFICATION_FAIL){
                $command->expectsOutput(self::PASSWORD_VERFICATION_FAIL_MESSAGE);
                continue;
                
            }
            if($testCase['status']==self::SUCCESS){
                $command->expectsOutput(self::SUCCESS_MESSAGE);
                
                
            }
                

        }

    }
    public function testUserExist(){
        foreach($this->testCases as $testCase){
            if($testCase['status']!==self::SUCCESS){
                continue;
            }
            $user = User::where("email",$testCase['email']);
            $this->assertDatabaseHas('users', [
                'email' => $testCase['email']
            ]);
            $user->delete();
        }
        
    }
}