@extends('Front.layouts')

@section('content')
<div style="font-size: 180%; ">{{$from_user_name}}からのメッセージ</div>
<div class="row">
        @foreach ($chats as $chat)
            <div class="col-sm-12">
                    <div class="card-body"  style="font-size: 140%; ">
                        {{$chat->body}} <br>
                    </div>
                    <div style="text-align: right;" >{{$chat->created_at}}</div>
            </div>
        @endforeach
    </div>
@endsection('content')