<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
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

Route::post('/newsletter', NewsletterController::class);
Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterController::class, 'create']);

    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/login', [SessionsController::class, 'store']);
});

Route::middleware('auth')->group(function() {
    Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
    Route::post('logout', [SessionsController::class, 'destroy']);

});



Route::middleware('admin')->group(function() {
    Route::get('admin/posts/create', [PostController::class, 'create'])->middleware('admin');
    Route::post('admin/posts', [PostController::class, 'store'])->middleware('admin');
});





// Route::get('categories/{category:slug}', function (Category $category) {
//     // ddd($path);


//     return view('welcome', ['posts' => $category->posts, 'currentCategory' => $category, 'categories' => Category::all()]);
// });
// Route::get('authors/{author:username}', function (User $author) {
//     // ddd($path);


//     return view('posts.index', ['posts' => $author->posts, ]);
// });
