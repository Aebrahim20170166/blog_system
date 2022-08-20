<?php

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
Route::get('/create_user', function () {
    $user = User::find(1);
    $user->image()->create([
        'name' => 'random file for user',
        'extension' => 'jpg',
        'path' => '/user/images/random_file.jpg'
    ]);
})->name('home');

Route::get('/insert_comment', function () {
    $comment = Comment::create([
        'body' => 'this is a trial comment',
        'post_id' => 1,
        'user_id' => 1
    ]);
})->name('home');

Route::get('/user', function () {
    //$comments = Comment::all();
    // $comment = Comment::find(1);
    $user = User::find(1);
    return $user->comments;
});

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/posts', function () {
    return view('post');
})->name('post');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



require __DIR__.'/auth.php';
