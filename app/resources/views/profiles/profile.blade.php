@extends('app')

@section('title')
    userのプロフィール
@endsection

@section('content')
    @include('navs.profile')

    <h1>ユーザープロフィール表示画面</h1>
    <p>ようこそ,{{ Auth::user()->name }}さん</p>
@endsection
