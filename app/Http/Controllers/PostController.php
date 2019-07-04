<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use App\Social;
use App\Comment;
use App\User;

class PostController extends Controller
{
    public function store(StoreBlogPost $request){
        

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $post->save();
        return redirect('/')->with(['response'=>'posted!','snackbar'=>'Post updated ..!']);
    }

    public function createPostView(Request $request)
    {
        $icons=Social::all();
        return view('create-post')->with(['icons'=>$icons]);
    }


    public function showUpdateView($id)
    {
        $post=Post::find($id);
        return view("update-post")->with(['post'=>$post,'update'=>true,'icons'=>Social::all()]);
    }

    public function showPosts()
    {
        return view('main')->with(["icons"=>Social::all(),'posts'=>Post::orderBy("created_at","desc")->paginate(6)]);
        
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

        $icons=Social::all();
        return view('post-404')->with(['icons'=>$icons]);
        
    }

    public function update(UpdatePostRequest $request)
    {

        
        $post=Post::find($request->post_id);
        $post->title=$request->title;
        $post->content = $request->content;
        $post->save();
        return redirect('/posts/'.$post->id)->with(['snackbar'=>'Post updated ..!']);
    }

    public function delete(DeletePostRequest $request)
    {
        
        
        $post=Post::find($request->id);
        $post->delete();
        return redirect("/")->with(['snackbar'=>'Post deleted ..!']);
    }

    public function getComments($id){
        $post=Post::find($id);
        if ($post!=null){
            $comments = $post->comments()->get();
            for($i=0;$i<count($comments);$i++){
                $userID=$comments[$i]['user_id'];
                $userName = User::find($userID);
                $comments[$i]['user_name']=$userName->name;
            }
            return $comments;
        }
        return [];
    }

    public function getPosts(){

        return Post::orderBy("created_at","desc")->paginate(6);

    }
    
}
