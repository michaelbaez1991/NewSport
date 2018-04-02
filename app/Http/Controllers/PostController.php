<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller{
    // public function __construct(){
    //     $this->middleware('auth');
    // }

    /* All posts */
    public function allPost(){   
        $posts = Post::orderBy('id', 'DESC')
                     ->where('status', 'PUBLISHED')
                     ->paginate(12);
        return view('web.posts', compact('posts'));
    }

    /* All posts for categy */
    public function category($slug){
        $category = Category::where('slug', $slug)
                            ->pluck('id')
                            ->first();

        $posts = Post::where('category_id', $category)
                     ->orderBy('id', 'DESC')
                     ->where('status', 'PUBLISHED')
                     ->paginate(12);

        return view('web.posts', compact('posts'));
    }

    /* All posts for tags */
    public function tag($slug){
        $posts = Post::whereHas('tags', function($query) use ($slug){
                     $query->where('slug', $slug);
                   })->orderBy('id', 'DESC')
                     ->where('status', 'PUBLISHED')
                     ->paginate(12);

        return view('web.posts', compact('posts'));
    }

    /* Posts for filter */
    public function post($slug){   
        $posts = Post::where('slug', $slug)
                     ->first();
        return view('web.detail', compact('posts'));
    }
}
