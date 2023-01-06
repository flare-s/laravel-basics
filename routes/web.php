<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['posts' => Post::latest()->with(['category', 'user'])->get()]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    // ddd($path);


    return view('post', ['post' => $post]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    // ddd($path);


    return view('welcome', ['posts' => $category->posts->load(['category', 'user'])]);
});
