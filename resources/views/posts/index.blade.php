@extends('Front.layouts')

@section('content')
    <div class="mb-4">
    タグ <br>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                掲示板に投稿する
            </a>
    </div>
        
            <div class="f-container">
            @foreach ($posts as $post)
                <div class="f-item">
                    <div class="card mb-4">
                        <div class="card-header">投稿のタイトル</div>
                        <a class="card-body" href="{{ route('posts.show', ['post' => $post]) }}">
                            {{$post->title}}
                        </a>
                        <div class="card-footer">
                            投稿日時{{$post->created_at}}
                            コメント数{{$post->comments->count()}}
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            <div class="d-flex justify-content-center mb-5">
                {{ $posts->links() }}
            </div>

@endsection('content')