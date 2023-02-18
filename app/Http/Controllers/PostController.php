<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index() {
        // $posts = Post::latest();
    
        // if (request('search')) {
        //     $posts->where('title', 'like', '%' . request('search') . '%')
        //     ->orWhere('body', 'like', '%' . request('search') . '%');
        // }
    
        return view('welcome', [
            'posts' => Post::latest()->filter(request(['search', 'category']))->get(),
            'categories' => Category::all(),
            'currentCategory' => request('category') !== null  ? Category::firstWhere('slug', request('category')) : null
        ]);
    }

    public function show(Post $post) {
        return view('post', ['post' => $post, 'categories' => Category::all()]);
    }
}
