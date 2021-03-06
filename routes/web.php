<?php

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
    return view('welcome');
});

Route::get('/contacts', function () {
    return view('contacts');
});

Route::get('/gallery', function () {
    return view('gallery');
});
Route::get('/game', function () {
    return view('game');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/userprofile', 'UserController@profile');
Route::post('/userprofile', 'UserController@update_avatar');


Auth::routes();

Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');

Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/post/show/{id}', 'PostController@show')->name('post.show');

Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
// Route::get('/profile/{id}/edit/', function() {
//   return view('edit', compact('id'));
// })->name('profile.edit');
Route::group(['middleware' => 'role:admin'], function() {
   Route::resource('/profile', 'AdminController');
});
Route::get('/profile', 'AdminController@ShowUserlist');
 Route::get('/home', 'HomeController@index')->name('home');
