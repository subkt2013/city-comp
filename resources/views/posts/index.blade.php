@extends('Front.layouts')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @guest
        <div class="mb-4">
            <a href="{{ route('login') }}" class="btn btn-primary">
                {{ __('Login') }}
            </a>
            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="btn btn-primary">
                {{ __('Register') }}
            </a>
            @endif
        </div>
    @else
        <div class="mb-4">
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                投稿を新規作成する
            </a>
        </div>
        <div class="mb-4">
            <a class="btn btn-primary" href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
            </form>
        </div>
    @endguest



        @foreach ($posts as $post)
            <div class="card ">
                <a class="card-body" href="{{ route('posts.show', ['post' => $post]) }}">
                    {{$post->title}}
                </a>
                <div class="card-footer">
                    投稿日時{{$post->created_at}}
                    コメント数{{$post->comments->count()}}
                    投稿者(まずpostテーブルにカラムを追加し、コントローラいじる)
                </div>
            </div>
        @endforeach

            <div class="d-flex justify-content-center mb-5">
                {{ $posts->links() }}
            </div>
</div>

@endsection('content')