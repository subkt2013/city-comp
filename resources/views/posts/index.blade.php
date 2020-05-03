@extends('Front.layouts')

@section('content')
<div class="container">
    <div class="mb-4">
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            投稿を新規作成する
        </a>
    </div>
        @foreach ($posts as $post)
            <div class="card ">
                <div class="card-header">
                    {{$post->title}}
                </div>
                <div class="card-body">
                    <p class="card-text">
                    {{$post -> body}}                    
                    </p>
                </div>
                <div class="card-footer">
                    投稿日時{{$post->created_at}}
                    コメント数{{$post->comments->count()}}
                </div>
            </div>
        @endforeach
</div>

@endsection('content')