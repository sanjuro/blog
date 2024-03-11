<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request, $id)
    {
        $post = Post::find($id);
        $comments = $post-comments;
        return view('comments', compact('comments'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function create(Request $request, $id)
    {
        if ($request->ajax()){
            $user = Auth::user();
            $comment = new Comment;
 
            $comment->user_id = $user->id;
            $comment->post_id = $id;
            $comment->comment = $request->commenttext;
 
            $comment->save();
 
            return response($comment);
        }
    }
}