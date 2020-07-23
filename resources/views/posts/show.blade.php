@extends('Front.layouts')

@section('content')
    <div class="container mt-4">
            <div class="border p-4">
                <h5 class="h5 mb-4">
                    {{ $post->title }}
                </h5>
                <p class="h5 mb-4">
                    {{ $post->gender }}
                </p>
                <p class="h5 mb-4">
                    {{ $post->name }}
                </p>
                <p class="h5 mb-4">
                    <a href="{{ $post->url }}"> {{ $post->url }}</a>
                </p>
                <p class="mb-5">
                    {!! nl2br(e($post->body)) !!}
                </p>
            </div>
      
        <form class="mb-4" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input
            name="post_id"
            type="hidden"
            value="{{ $post->id }}"
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
                <a class="btn btn-secondary" href="{{ route('top') }}">
                戻る
                </a>
            </div>
        </form>
        
    </div>
@endsection