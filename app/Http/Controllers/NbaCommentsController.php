<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NbaPost;

class NbaCommentsController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'user_id'=> 'required',
            'nba_post_id' => 'required|exists:nba_posts,id',
            'body' => 'required|max:2000',
            'commenter_name' => 'required|nullable',
        ]);
        //nba_post_idを変更
        $post = NbaPost::findOrFail($params['nba_post_id']);
        $post->nba_comments()->create($params);

        return redirect()->route('posts.nba.show', ['post' => $post]);
    }
}