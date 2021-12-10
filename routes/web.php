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

//トップページ
Route::get('/','PostsController@index')->name('top');
//規約・ポリシー
Route::get('/terms','TermsController@index')->name('terms');
Route::group(['prefix' => '/terms'],function(){
    Route::get('/','TermsController@index')->name('terms');
    Route::get('/privacy','TermsController@index_privacy')->name('terms.privacy');
});
//チャット画面
Route::resource('chats', 'ChatsController', ['only' => ['index','show']]);


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
//タグ管理
Route::resource('/tags', 'TagsController', ['only' => ['show']]);

//認証
Auth::routes();

//管理者画面について 封印
//Route::group(['prefix' => '/admin'],function(){
//    Route::get('/','AdminController@index')->name('admin.index')->middleware('auth');
//    Route::get('/posts/{user_id}','AdminController@show_posts')->name('admin.show_posts');
//});

