@extends('navs.nav_frame')

@section('navItems')

    @include('navs.auth_check')
    
    <a href="{{ route('records.index') }}">戻る</a>
@endsection
