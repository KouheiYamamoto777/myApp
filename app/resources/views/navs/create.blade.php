@extends('navs.nav_frame')

@section('navItems')
    @auth
    
    {{-- Dropdown --}}

    <div class="dropdown ml-auto">
        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        Dropdown
        </button>

        <div class="dropdown-menu dropdown-primary dropdown-menu-right" aria-labelledby="dropdownMenu4">
            <a href="" class="dropdown-item">記録して終了</a>
            <a href="" class="dropdown-item">更新して終了</a>
            <div class="dropdown-divider"></div>
            <a href="{{ route('profile.show_profile', ['id' => Auth::id()]) }}" class="dropdown-item my-1">
                <i class="fas fa-exclamation-triangle"></i>
                記録・更新せず終了
            </a>            
        </div>
    </div>

    @endauth
@endsection
