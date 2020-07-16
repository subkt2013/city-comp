@extends('Front.layouts')

@section('content')
<div class="container">
<div class="mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                掲示板に投稿する
            </a>
        </div>
        @foreach ($posts as $post)
            <div class="card ">
                <a class="card-body" href="{{ route('posts.show', ['post' => $post]) }}">
                    {{$post->title}}
                </a>
                <div class="card-footer">
                    投稿日時{{$post->created_at}}
                    コメント数{{$post->comments->count()}}
                </div>
            </div>
        @endforeach

            <div class="d-flex justify-content-center mb-5">
                {{ $posts->links() }}
            </div>
</div>

@endsection('content')