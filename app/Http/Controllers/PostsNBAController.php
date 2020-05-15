<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;


class PostsNBAController extends Controller
{


    public function index()
    {
        $posts = Post::with(['comments'])->orderBy('created_at', 'desc')->paginate(10);

        return view('posts.nba.index',['posts'=>$posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'contributor_name' => 'required',
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        Post::create($params);

        return redirect()->route('top');
    }

    public function show($post_id)
    {
        $post = Post::findOrFail($post_id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function edit($post_id)
{
    $post = Post::findOrFail($post_id);

    return view('posts.edit', [
        'post' => $post,
    ]);
}

public function update($post_id, Request $request)
{
    $params = $request->validate([
        'contributor_name' => 'required',
        'title' => 'required|max:50',
        'body' => 'required|max:2000',
    ]);

    $post = Post::findOrFail($post_id);
    $post->fill($params)->save();

    return redirect()->route('posts.show', ['post' => $post]);
}

public function destroy($post_id)
{
    $post = Post::findOrFail($post_id);

    \DB::transaction(function () use ($post) {
        $post->comments()->delete();
        $post->delete();
    });

    return redirect()->route('top');
}

}
