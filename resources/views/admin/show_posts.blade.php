@extends('admin.layouts')

@section('content')
    <div class="container">
        <h2>投稿一覧</h2>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>タイトル</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->contributor_name }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td>{{ $post->created_at }}</td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection('content')