<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Chat;
use App\User;

class ChatsController extends Controller
{
    public function show($from_id)
    {
        //ログイン中のユーザ
        $user = Auth::user();
        //chats テーブルのfrom id とto idがuserテーブルのidと一致するチャットを拾ってくる
        //chats テーブルのto idがログイン中のユーザIDと一致したものすべて
        $chats = Chat::where('to_user_id',$user->id)->where('from_user_id',$from_id)->orderBy('created_at', 'desc')->get();
        
        $from_user_name = User::findOrFail($from_id)->name;

        //上記を作成日付で並び替える
        return view('chats.show',['chats' => $chats,'user'=> $user,'from_user'=> $from_id,'from_user'=> $from_id,'from_user_name'=> $from_user_name]);
    }

    public function index()
    {
        return view('chats.index');
    }

}
