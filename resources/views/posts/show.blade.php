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
                <p class="h5 mb-4">
                    <!-- コピー対象要素とコピーボタン -->
                    Skype ID
                    <input id="copyTarget" type="text" value="{{ $post->skype }} " readonly>
                    <button onclick="copyToClipboard()">Copy text</button>
                </p>
                <p class="mb-5">
                    {!! nl2br(e($post->body)) !!}
                </p>
                @isset($post -> tag_id)
                <p class="p-2 mb-4 d-inline bg-secondary text-white">
                    {{ config('const.tag')[$post -> tag_id ]}}
                </p>
                @endisset
            </div>
            <div class="mt-4">
                <a class="btn btn-secondary" href="{{ route('top') }}">
                戻る
                </a>
            </div>
        </form>
        
    </div>
@endsection