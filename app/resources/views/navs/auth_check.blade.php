@unless (Auth::check())
    <div>
        <a href="{{ route('login') }}" class="red-text">
            <i class="fas fa-exclamation"></i>
            再ログインが必要です
        </a>
    </div>
@endunless
