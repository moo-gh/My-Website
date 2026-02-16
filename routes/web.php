<?php

use App\Post;
use App\Comment;

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

// Route::view('/','index');
Route::get('/', function () {
    return view('redirecting');
});
Route::view('/about','about');
Route::view('/contact','contact');
Route::get('/projects','PostController@projects');
Route::view('/daftarMap','dMap');
Route::view('/kargahMap','kMap');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('search', 'PostController@search')->name('search');


Route::resource('posts', 'PostController');
Route::get('blog','PostController@index');

Route::post('/posts/{post}/comments', 'CommentController@store');
Route::post('/comments/bot.php', 'CommentController@control');

Route::post('/foodBot/bot.php',function(){
    return 0;
});