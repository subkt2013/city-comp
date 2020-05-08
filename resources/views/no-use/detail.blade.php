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
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">ネットで相席とは</h1>
    <p class="lead">日本初。100%オンラインの相席飲み会サービスです。</p>
    <p>です</p>
  </div>
</div>

@endsection

{{-- footerの内容--}}
@section('footer') 
@include('footer')
@endsection