<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;

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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

// Route::get('categories/{category:slug}', function (Category $category) {
//     // ddd($path);


//     return view('welcome', ['posts' => $category->posts, 'currentCategory' => $category, 'categories' => Category::all()]);
// });
Route::get('authors/{author:username}', function (User $author) {
    // ddd($path);


    return view('posts.index', ['posts' => $author->posts, ]);
});
