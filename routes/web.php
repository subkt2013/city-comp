<?php

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

Route::get('/','PostsController@index')->name('top');

//切り分けてルートに名前をつける
//Route::resource('posts','PostsController',['only' => ['create', 'store','show','edit','update','destroy']]);
Route::group(['prefix' => '/posts'],function(){
    Route::get('/create', 'PostsController@create')->name('posts.create');
    Route::post('/', 'PostsController@store')->name('posts.store');
    Route::get('/{post}', 'PostsController@show')->name('posts.show');
    Route::get('/{post}/edit', 'PostsController@edit')->name('posts.edit');
    Route::put('/{post}', 'PostsController@update')->name('posts.update');
    Route::delete('/{post}', 'PostsController@delete')->name('posts.delete');
});
Route::resource('comments', 'CommentsController', ['only' => ['store']]);

//認証
Auth::routes();

//管理者画面について
Route::group(['prefix' => '/admin'],function(){
    Route::get('/','AdminController@index')->name('admin.index');
    Route::get('/posts/{user_id}','AdminController@show_posts')->name('admin.show_posts');
});

