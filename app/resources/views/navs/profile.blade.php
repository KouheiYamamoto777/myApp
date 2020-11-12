@extends('navs.nav_frame')

@section('navItems')

    @if (!Auth::user())
        <div>
            <a href="{{ route('login') }}">ログインし直す</a>
        </div>
    @endif

    @auth
    <div class="dropdown ml-auto">

        <a 
        href="{{ route('records.create') }}" 
        class="btn btn-primary" 
        role="button"
        >
            <i class="fas fa-file-signature"></i>
            記録
        </a>

        <button 
        class="btn btn-primary dropdown-toggle" 
        type="button" 
        id="dropdownMenu4" 
        data-toggle="dropdown"
        aria-haspopup="true" 
        aria-expanded="false"
        >
            Dropdown
        </button>

        {{-- DropdownMenu --}}
        <div 
        class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="dropdownMenu4"
        >

            <a 
            href="{{ route('records.index') }}" 
            class="dropdown-item"
            >
                タイムライン
            </a>

            <a 
            href="{{ route('profile.show_profile_custom', ['id' => Auth::id()]) }}" 
            class="dropdown-item"
            >
                カスタム
            </a>

            <div class="dropdown-divider"></div>

            <a 
            href="javascript:logout_form.submit()" class="dropdown-item my-1"
            >
                <i class="fas fa-exclamation-triangle"></i>
                ログアウト
            </a>           

            <form 
            action="{{ route('logout') }}" 
            method="post" 
            name="logout_form"
            id="logout-button"
            >
                @csrf
            </form> 
        </div>
        
    </div>
    @endauth

@endsection
