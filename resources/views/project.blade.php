@extends('Front.layouts')

{{-- headタグの内容--}}
@section('head') 
@include('head')
@endsection

{{-- headerの内容--}}
@section('header') 
@include('header')
@endsection

{{-- contentの内容--}}
@section('content') 

<div class="jumbotron">
    <h1 class="display-4">ネットで相席</h1>
    <p class="lead">サービスの説明</p>
    <hr class="my-4">
    <p>ネットで相席</p>
    <p>日本初の1対1に特化した相席飲み会サービスです。</p>
</div>


@endsection

{{-- footerの内容--}}
@section('footer') 
@include('footer')
@endsection