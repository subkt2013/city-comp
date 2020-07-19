@extends('Front.layouts')

@section('content')
    <div class="container mt-4">
        <div class="border p-4">
            <h1 class="h5 mb-4">
                投稿の新規作成
            </h1>
            <form method="POST" action="{{ route('posts.store') }}">
                @csrf

                <fieldset class="mb-4">
                    <div class="form-group">
                        <label for="title">
                            タイトル
                        </label>
                        <input
                            id="title"
                            name="title"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') }}"
                            type="text"
                        >
                        <label for="gender">
                            性別
                        </label>
                        <p>
                        <input id="gender" name="gender" type="radio" value="男"> 男
                        <input id="gender" name="gender" type="radio" value="女"> 女
                        <input id="gender" name="gender" type="radio" value="その他">その他
                        </p>
                        <label for="title">
                            名前
                        </label>
                        <input
                            id="name"
                            name="name"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') }}"
                            type="text"
                        >
                        <label for="title">
                            招待URL
                        </label>
                        <input
                            id="url"
                            name="url"
                            class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}"
                            value="{{ old('title') }}"
                            type="text"
                        >

                        @if ($errors->has('title'))
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        @endif
                    </div>

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

                    <div class="mt-5">
                        <button type="submit" class="btn btn-primary">
                            投稿する
                        </button>
                        <a class="btn btn-secondary" href="{{ route('top') }}">
                            戻る
                        </a>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
