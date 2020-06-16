<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WithPost;


class WithPostsController extends Controller
{


    public function index()
    {
        $posts = WithPost::with(['with_comments'])->orderBy('created_at', 'desc')->paginate(10);

        return view('posts.with.index',['posts'=>$posts]);
    }

    public function create()
    {
        return view('posts.with.create');
    }

    public function store(Request $request)
    {
        $params = $request->validate([
            'user_id'=> 'required',
            'contributor_name' => 'required',
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        WithPost::create($params);

        return redirect()->route('posts.with.index');
    }

    public function show($post_id)
    {
        $post = WithPost::findOrFail($post_id);

        return view('posts.with.show', [
            'post' => $post,
        ]);
    }

    public function edit($post_id)
{
    $post = WithPost::findOrFail($post_id);

    return view('posts.with.edit', [
        'post' => $post,
    ]);
}

public function update($post_id, Request $request)
{
    $params = $request->validate([
        'user_id'=> 'required',
        'contributor_name' => 'required',
        'title' => 'required|max:50',
        'body' => 'required|max:2000',
    ]);

    $post = WithPost::findOrFail($post_id);
    $post->fill($params)->save();

    return redirect()->route('posts.with.show', ['post' => $post]);
}

public function destroy($post_id)
{
    $post = WithPost::findOrFail($post_id);

    \DB::transaction(function () use ($post) {
        $post->with_comments()->delete();
        $post->delete();
    });

    return redirect()->route('posts.with.index');
}

}
