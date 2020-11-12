@extends('app')

@section('title', '詳細画面')

@section('content')
    @include('navs.show')

    <div class="container mt-4">
        @include('card')

        <div class="text-center">
            <a href="{{ route('profile.show_profile', []) }}" class="btn">
                このユーザーのプロフィールを見る
            </a>
        </div>
    </div>

@endsection
