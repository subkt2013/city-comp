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

            $posts = Post::where('user_id',$user_id );
    
            return  view('admin.show_posts',['posts'=> $posts]);
    
        }
    
        public function show_comments($id){
            
            $user = User::findOrFail($id);
            return null;
    
        }   
}
