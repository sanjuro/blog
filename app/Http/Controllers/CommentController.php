<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Comment;
use App\Models\Post;
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

        if (!$post) {
            abort(404); // Post not found, return a 404 error
        }
    
        $comments = $post->comments;
        return view('comments.list', compact('comments'));
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
            $comment->text = $request->commenttext;
 
            $comment->save();
 
            return response($comment);
        }
    }
}