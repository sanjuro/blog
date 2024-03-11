<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
    * Show all posts
    *
    * @param  \Illuminate\Http\Request  $request
    */
    public function index() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
    * Show one posts
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        // Fetch the post from the database by ID
        $post = Post::find($id);

        // If post is not found, return a 404 error
        if (!$post) {
            abort(404);
        }

        // Pass the post data to the view for rendering
        return view('posts.show', ['post' => $post]);
    }
        
    /**
    * Show the create post
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function create() {
        return view('posts.create');
    }

    /**
    * Store the new post
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        // validations
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    
}
