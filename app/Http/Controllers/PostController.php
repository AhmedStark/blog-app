<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use App\Social;
use App\Comment;
use App\User;

class PostController extends Controller
{
    public function store(Request $request){
        if(empty($request->title)||empty($request->content)){
            return redirect()->back()->with(['response'=>'<p class="red--text">You left one of the fields empty</p>','empty'=>true]);
        }

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $post->save();
        return redirect('/')->with(['response'=>'posted!']);
    }

    public function createPostView(Request $request)
    {
        $icons=Social::all();
        return view('create-post')->with(['icons'=>$icons]);
    }


    public function getPosts()
    {
        return view('main')->with(["icons"=>Social::all(),'posts'=>Post::paginate(6)]);
        
    }

    public function showPost($id)
    {
        if (Post::find($id)!=null){
            $icons=Social::all();
            $post = Post::find($id);
            $comments = $post->comments()->get();

            for($i=0;$i<count($comments);$i++){
                $userID=$comments[$i]['user_id'];
                $userName = User::find($userID);
                $comments[$i]['user_name']=$userName->name;
            }
            return view('post-page')->with(['post'=>Post::find($id),'icons'=>$icons,'comments'=>$comments]);
        }

        return view('post-404');
        
    }

}
