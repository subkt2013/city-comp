<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $params = $request->validate([
            'user_id'=> 'required',
            'post_id' => 'required|exists:posts,id',
            'body' => 'required|max:2000',
            'commenter_name' => 'required|nullable',
        ]);

        $post = Post::findOrFail($params['post_id']);
        $post->comments()->create($params);

        return redirect()->route('posts.show', ['post' => $post]);
    }
}