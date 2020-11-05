@extends('navs.nav_frame')

@section('navItems')
    
    @guest
        <div class="">
            <a 
            href="{{ route('login') }}" 
            class="btn btn-brown btn-md" 
            role="button"
            >
                <i class="fas fa-sign-in-alt"></i>
                ログイン
            </a>
    
            <a 
            href="{{ route('register') }}" 
            class="btn btn-brown btn-md" 
            role="button"
            >
                ユーザー登録
            </a>
        </div>
    @endguest

@endsection
