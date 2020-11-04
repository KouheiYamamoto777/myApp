@extends('app')

@section('title', 'ようこそ')

@section('content')

    @include('navs.guest')

    <h1>ようこそ、ゲストユーザーさん</h1>
    <h2>あなたは現在ログインしていません。</h2>
    
@endsection
