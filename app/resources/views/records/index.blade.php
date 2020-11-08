@extends('app')

@section('title')
    ようこそ
@endsection

@section('content')
    @include('navs.timeline')

    <div class="container my-4">
        @forelse ($posts as $post)
            @include('card')
        @empty
            <h2 class="font-weight-normal mt-2">Not post yet...</h2>
        @endforelse
    </div>

@endsection
