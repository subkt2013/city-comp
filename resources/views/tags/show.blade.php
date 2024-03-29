@extends('Front.layouts')

@section('content')
    <div class="mb-4">
        <br>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            掲示板に投稿する
        </a>
    </div>
    <div class="row">
        @foreach ($posts as $post)
            <div class="col-sm-4">
                <div class="card">
                    <div class="card-header"><a href="{{ route('posts.show', ['post' => $post]) }}"> {{$post->title}}</a></div>
                    <a class="card-body">
                        {{$post->body}}
                    </a>
                    <div class="card-footer">
                        性別: {{$post->gender}} <br>
                        投稿日時: {{$post->created_at}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        <a class="btn btn-secondary" href="{{ route('top') }}">
        戻る
        </a>
    </div>
    <div class="d-flex justify-content-center mb-5">
        {{ $posts->links() }}
    </div>
    <footer>
        <div class="container"><a href="{{ route('terms') }}">規約</a> </div>
    </footer>

@endsection('content')