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

Route::group(['prefix' => '/nba'],function(){
    Route::get('/','NbaPostsController@index')->name('posts.nba.index');
    Route::get('/create', 'NbaPostsController@create')->name('posts.nba.create');
    Route::post('/', 'NbaPostsController@store')->name('posts.nba.store');
    Route::get('/{post}', 'NbaPostsController@show')->name('posts.nba.show');
    Route::get('/{post}/edit', 'NbaPostsController@edit')->name('posts.nba.edit');
    Route::put('/{post}', 'NbaPostsController@update')->name('posts.nba.update');
    Route::delete('/{post}', 'NbaPostsController@delete')->name('posts.nba.delete');
    //Route::post('comments', 'NbaCommentsController@store')->name('comments.nba.store');
});

//書き方をpostに合わせる nbapostのように１ずつ定義する
//Route::resource('nba_comments', 'NbaCommentsController', ['only' => ['store']])->name('comments.nba.store');
Route::post('nba_comments', 'NbaCommentsController@store')->name('comments.nba.store');

//認証
Auth::routes();


/* 前のテスト開発
Route::get('/inquiry', function () {
    return view('inquiry');
});

Route::get('/project', function () {
    return view('project');
});

Route::get('/detail', function () {
    return view('detail');
});
*/

//authのライブラリを仕様したときの/homeを封印
//Route::get('/home', 'HomeController@index')->name('home');
