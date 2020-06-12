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

//nbaについてのルート
Route::group(['prefix' => '/nba'],function(){
    Route::get('/','NbaPostsController@index')->name('posts.nba.index');
    Route::get('/create', 'NbaPostsController@create')->name('posts.nba.create');
    Route::post('/', 'NbaPostsController@store')->name('posts.nba.store');
    Route::get('/{post}', 'NbaPostsController@show')->name('posts.nba.show');
    Route::get('/{post}/edit', 'NbaPostsController@edit')->name('posts.nba.edit');
    Route::put('/{post}', 'NbaPostsController@update')->name('posts.nba.update');
    Route::delete('/{post}', 'NbaPostsController@delete')->name('posts.nba.delete');
});
//書き方をpostに合わせる nbapostのように１ずつ定義する
//Route::resource('nba_comments', 'NbaCommentsController', ['only' => ['store']])->name('comments.nba.store');
//Route::post('nba_comments', 'NbaCommentsController@store')->name('comments.nba.store');
Route::resource('nba_comments', 'NbaCommentsController', ['only' => ['store']]);

//バスケ仲間についてのルート
Route::group(['prefix' => '/with'],function(){
    Route::get('/','WithPostsController@index')->name('posts.with.index');
    Route::get('/create', 'WithPostsController@create')->name('posts.with.create');
    Route::post('/', 'WithPostsController@store')->name('posts.with.store');
    Route::get('/{post}', 'WithPostsController@show')->name('posts.with.show');
    Route::get('/{post}/edit', 'WithPostsController@edit')->name('posts.with.edit');
    Route::put('/{post}', 'WithPostsController@update')->name('posts.with.update');
    Route::delete('/{post}', 'WithPostsController@delete')->name('posts.with.delete');
});

//書き方をpostに合わせる nbapostのように１ずつ定義する
//Route::resource('nba_comments', 'NbaCommentsController', ['only' => ['store']])->name('comments.nba.store');
//Route::post('nba_comments', 'NbaCommentsController@store')->name('comments.nba.store');
Route::resource('with_comments', 'WithCommentsController', ['only' => ['store']]);

//認証
Auth::routes();

//gemseeの機能を移植

