<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterController::class, 'create']);

    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
    Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
});




Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Route::get('categories/{category:slug}', function (Category $category) {
//     // ddd($path);


//     return view('welcome', ['posts' => $category->posts, 'currentCategory' => $category, 'categories' => Category::all()]);
// });
// Route::get('authors/{author:username}', function (User $author) {
//     // ddd($path);


//     return view('posts.index', ['posts' => $author->posts, ]);
// });
