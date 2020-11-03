@extends('app')

@section('title', '記録を残す')

@section('content')
    @include('nav')

    <h1 class="h2">2020年の記録</h1>
    <canvas>
        ここにグラフを描画する
    </canvas>

    <p>記録フォーム</p>
    <form action="">
        <input type="text">

        <button class="btn btn-block">投稿ボタン(実際はプルダウンに実装)</button>
    </form>
@endsection
