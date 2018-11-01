<!-- 親テンプレート -->
@extends('layouts.mypage')
 
@section('title', 'ページタイトル')
 
<!-- 親テンプレートに表示させる場所 -->
@section('content')
：（内容）
@endsection

@if(Session::has('message'))
  メッセージ：{{ session('message') }}
@endif