@extends('navs.nav_frame')

@section('navItems')

    @include('navs.auth_check')
    
    @auth

    <div class="dropdown ml-auto">

        {{-- Dropdown --}}
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
            <a href="javascript:store.submit()" class="dropdown-item">記録して終了</a>
            <a href="javascript:update.submit()" class="dropdown-item">更新して終了</a>

            <div class="dropdown-divider"></div>

            <a 
            href="{{ route('profile.show_profile', ['id' => Auth::id()]) }}" class="dropdown-item my-1"
            >
                <i class="fas fa-exclamation-triangle"></i>
                記録・更新せず終了
            </a>            
        </div>

        <form action="{{ route('records.update', ['user' => Auth::user()]) }}" method="post" name="update">
            @csrf
            @method('put')
        </form>

    </div>

    @endauth
@endsection
