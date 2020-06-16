<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WithPost;

class WithCommentsController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'user_id'=> 'required',
            'with_post_id' => 'required|exists:with_posts,id',
            'body' => 'required|max:2000',
            'commenter_name' => 'required|nullable',
        ]);
        //nba_post_idを変更
        $post = WithPost::findOrFail($params['with_post_id']);
        $post->with_comments()->create($params);

        return redirect()->route('posts.with.show', ['post' => $post]);
    }
}