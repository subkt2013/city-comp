<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\NbaPost;


class NbaCommentsController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
        //post_id_nbaを変更
            'post_id_nba' => 'required',
            'body' => 'required|max:2000',
            'commenter_name' => 'required|nullable',
        ]);
        //post_id_nbaを変更
        $post = NbaPost::findOrFail($params['post_id_nba']);
        $post->nba_comments()->create($params);

        return redirect()->route('posts.nba.show', ['post' => $post]);
    }
}