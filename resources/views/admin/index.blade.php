@extends('admin.layouts')
    @section('content')
    <div class="container">
        <h2>ユーザ一覧</h2>
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>投稿内容</th>
                <th>削除</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>投稿内容へのボタン</td>
                <td>削除ボタン</td>
            </tr>
            @endforeach
        </table>
    </div>
    @endsection



