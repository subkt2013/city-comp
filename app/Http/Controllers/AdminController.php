<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class AdminController extends Controller
{
    public function index(){
        
        $users = User::all();

        return view('admin.index',['users'=> $users]);
    }
    //再考
    public function show_posts($user_id){

        //$get()を忘れずに!!;
        $posts = Post::where('user_id',$user_id)->get();

        return view('admin.show_posts',['posts'=> $posts]);

    }
    
}
