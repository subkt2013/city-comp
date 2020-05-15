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

Route::get('/', 'PostsController@index')->name('top');

//各スレッドへのパス設定

Route::group(['prefix' => '/nba'],function(){

    Route::get('/', 'PostsNBAController@index')->name('nba');

    Route::resource('/posts','PostsNBAController',['only' => ['create', 'store','show','edit','update','destroy']]);

    Route::resource('/comments', 'CommentsController', ['only' => ['store']]);

});

Route::resource('posts','PostsController',['only' => ['create', 'store','show','edit','update','destroy']]);

Route::resource('comments', 'CommentsController', ['only' => ['store']]);

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
