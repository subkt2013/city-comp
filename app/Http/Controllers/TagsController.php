<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class TagsController extends Controller
{
    public function show($tag_id)
    {
        $tag = Tag::findOrFail($tag_id);
        $posts = Post::where('tag_id',$tag_id)->orderBy('created_at', 'desc')->paginate(12);

        return view('tags.show', [
            'tag' => $tag,
            'posts' => $posts,
        ]);
    }
}
