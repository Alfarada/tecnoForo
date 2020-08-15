<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class CreatePostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {   
        // Get currently post
        $post = new Post(request()->validate([
            'title' => 'required',
            'content' => 'required'
        ]));


        // Get cunrrently auth user and save this post
        auth()->user()->posts()->save($post);

        return $post->title;
    }
}
