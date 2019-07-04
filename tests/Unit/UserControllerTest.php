<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Sentinel;
use WithoutMiddleware;
use App\User;
class UserControllerTest extends TestCase
{
    private $credentials=[
        'name' => 'John',
        'email'    => 'joe.smiths@example.co.nz',
        'password' => 'password',
        'repeat_password'=>'password',
    ];
    
    public function testSignUp()
    {
        $this->withoutMiddleware();
        $response = $this->json('POST', '/signup', $this->credentials);
        $response->assertStatus(302);
        $credentials=$this->credentials;
        return $credentials;

    }

    /**
     * @depends testSignUp
     */

    public function testLogin($credentials)
    {
        $this->withoutMiddleware();
        $response = $this->json('POST', '/login', $credentials);
        $response->assertStatus(302);

        $this->assertTrue(Sentinel::check()!=null);
        User::where('email','=',$credentials['email'])->first()->delete();

    }
}
