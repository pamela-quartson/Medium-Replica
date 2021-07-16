<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    $posts = Post::all();
    return view('index', compact('posts'));
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PostController::class, 'currUserPosts'])->name('dashboard');

Route::resource('posts', PostController::class);

Route::resource('comments', CommentController::class);

Route::resource('claps', ClapController::class);

Route::resource('categories', CategoryController::class);
