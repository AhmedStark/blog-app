<?php

use Sentinel;
use WithoutMiddleware;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Post;

class PostControllerTest extends TestCase
{       
    public const SUCCESS=0;
    public const FILEDS_EMPTY_FAIL=1;

    private $credentials=[
        'name' => 'John',
        'email'    => 'jon.doe@example.com',
        'password' => 'password',
        'r_password'=>'password',
    ];

    private $testCases=[
        ["title"=>"",
        "content"=>"",
        "status"=>self::FILEDS_EMPTY_FAIL],


        ["title"=>"",
        "content"=>"content"
        ,"status"=>self::FILEDS_EMPTY_FAIL],

        ["title"=>"title"
        ,"content"=>"content"
        ,"status"=>self::SUCCESS],
    ];
    public const CREATE_POST_URL = "/store-post";

    private $id;

    

    public function testCreatePost(){

        $this->withoutMiddleware();

        
        
        foreach($this->testCases as $testCase){
            $response = $this->json('POST', '/store-post', ['title' => $testCase['title'],"content"=>$testCase['content']]);
            

            if($testCase['status']==self::FILEDS_EMPTY_FAIL){
                $response->assertStatus(422);
                
            }else{
                
                $response->assertStatus(302);

            }
            
        }
    }


    
    public function testUpdatePost(){

        $this->withoutMiddleware();

        $post=Post::orderby('created_at','desc')->first();
        $id=$post->id;
        $response = $this->json('POST', '/post/update/', ['title' => 'new title',"content"=>'new content','post_id'=>$id]);
                
        $response->assertStatus(302);
        return  $id;
            
    }
    /**
     * @depends testUpdatePost
     */
    public function testUpdatedVariables($id)
    {   
        
        $newTitle=Post::find($id)->first()->title;
        $newContent=Post::find($id)->first()->content;
        
        $this->assertTrue($newTitle=='new title');
        $this->assertTrue($newContent=='new content');
    }


    public function testDeletePost()
    {

        $this->withoutMiddleware();


        $post=Post::orderby('created_at','desc')->first();
        $id=$post->id;
        $response = $this->json('POST', '/post/delete/', ['id'=>$id]);        
        $response->assertStatus(302);
        return  $id;
    }

    /**
     * @depends testDeletePost
     */
    public function testDeleteHappened($id)
    {   
        $this->assertTrue(!Post::find($id));
    }
    
}