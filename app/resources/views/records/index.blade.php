@extends('app')

@section('title')
    ようこそ
@endsection

@section('content')
    @include('navs.timeline')

    <h1 class="h2">タイムライン</h1>
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
    
@endsection
