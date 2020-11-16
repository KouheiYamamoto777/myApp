@extends('navs.nav_frame')

@section('navItems')

    @include('navs.auth_check')

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
            href="{{ route('profile.show_profile', ['id' => Auth::id()]) }}" 
            class="dropdown-item"
            >マイページ</a>

            <div class="dropdown-divider"></div>

            <a 
            href="javascript:logout_form.submit()" class="dropdown-item my-1"
            >
                <i class="fas fa-exclamation-triangle"></i>ログアウト</a>           

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
