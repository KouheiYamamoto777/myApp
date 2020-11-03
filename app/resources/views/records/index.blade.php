@extends('app')

@section('title')
    ようこそ
@endsection

@section('content')
    <div class="container">
        @include('nav')
    
        <h1 class="h2">メインページ</h1>
        <p>未ログインユーザーのドキュメントルート</p>
        @forelse ($posts as $post)
            <div>
                <div class="">
                    <p class="title">{{ $post->name }}</p>
                    <p>{{ $post->title }}</p>
                    <p>{{ $post->comment }}</p>
                </div>
            </div>
        @empty
            <p>post not yet...</p>
        @endforelse
    </div>
@endsection
