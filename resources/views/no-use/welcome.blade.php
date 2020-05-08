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
@include('content')
@endsection

{{-- footerの内容--}}
@section('footer') 
@include('footer')
@endsection