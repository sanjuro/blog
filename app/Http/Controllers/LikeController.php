<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
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
            $post = Post::find($id);
            $like = Like::where('user_id', $user->id)
                ->where('post_id', $id)
                ->first();

            if($like) {
                return response($post->likesCount());
            } else {

                $like = new Like;

                $like->user_id = $user->id;
                $like->post_id = $id;
    
                $like->save();
    
                return response($post->likesCount());
            }
        }
    }
}