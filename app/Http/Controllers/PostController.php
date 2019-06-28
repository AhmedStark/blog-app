<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Post;
use App\Social;
class PostController extends Controller
{
    public function store(Request $request){

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();
        $post->save();
    }

    public function createPostView(Request $request)
    {
        $icons=Social::all();
        return view('create-post')->with(['icons'=>$icons]);
    }


}
