<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostNBA;


class PostsNBAController extends Controller
{


    public function index()
    {
        $posts = PostNBA::with(['comments_nba'])->orderBy('created_at', 'desc')->paginate(10);

        return view('posts.nba.index',['posts'=>$posts]);
    }

    public function create()
    {
        return view('posts.nba.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'contributor_name' => 'required',
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        PostNBA::create($params);

        return redirect()->route('nba');
    }

    public function show($post_id)
    {
        $post = PostNBA::findOrFail($post_id);

        return view('posts.nba.show', [
            'post' => $post,
        ]);
    }

    public function edit($post_id)
{
    $post = PostNBA::findOrFail($post_id);

    return view('posts.nba.edit', [
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

    $post = PostNBA::findOrFail($post_id);
    $post->fill($params)->save();

    return redirect()->route('posts.nba.show', ['post' => $post]);
}

public function destroy($post_id)
{
    $post = PostNBA::findOrFail($post_id);

    \DB::transaction(function () use ($post) {
        $post->comments()->delete();
        $post->delete();
    });

    return redirect()->route('nba');
}

}
