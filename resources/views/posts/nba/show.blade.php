@extends('Front.layouts')

@section('content')
    <div class="container mt-4">
            <div class="border p-4">
                <h1 class="h5 mb-4">
                    {{ $post->title }}
                </h1>
                <p class="mb-5">
                    {!! nl2br(e($post->body)) !!}
                </p>

                <section>
                    <h2 class="h5 mb-4">
                        コメント
                    </h2>

                    @forelse($post->nba_comments as $comment)
                        <div class="border-top p-4">
                            <time class="text-secondary">
                                {{ $comment->created_at->format('Y.m.d H:i') }}
                            </time>
                            <p class="mt-2">
                                {{ $comment->commenter_name }}
                            </p>
                            <p class="mt-2">
                                {!! nl2br(e($comment->body)) !!}
                            </p>
                        </div>
                    @empty
                        <p>コメントはまだありません。</p>
                    @endforelse
                </section>
            </div>
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
        <form class="mb-4" method="POST" action="{{ route('nba_comments.store') }}">
            @csrf
            <input
            name="nba_post_id"
            type="hidden"
            value="{{ $post->id }}"
            >
            <input
            name="commenter_name"
            type="hidden"
            value="{{ Auth::user()->name  }}"
            >

            <div class="form-group">
                <label for="body">
                本文
                </label>

                <textarea
                id="body"
                name="body"
                class="form-control {{ $errors->has('body') ? 'is-invalid' : '' }}"
                rows="4"
                >{{ old('body') }}</textarea>
                @if ($errors->has('body'))
                <div class="invalid-feedback">
                {{ $errors->first('body') }}
                </div>
                @endif
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">
                コメントする
                </button>
            </div>
        </form>

        @endguest
    </div>
@endsection