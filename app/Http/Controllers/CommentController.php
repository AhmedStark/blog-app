<?php

namespace App\Http\Controllers;

use App\Comment;
use Sentinel;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request)
    {
        if(empty($request->comment)||empty($request->post_id)){
            return $request;//redirect()->back()->with(['response'=>'<p class="red--text">You left one of the fields empty</p>','empty'=>true]);
        }

        $comment = new Comment;
        $comment->post_id = $request->post_id;
        $comment->comment = $request->comment;
        $comment->user_id = Sentinel::getUser()->id;
        
        $comment->save();
        return redirect('/')->with(['response'=>'posted!']);
    }
}
