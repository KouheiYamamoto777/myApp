<header>
    <div class="container">
        <h1>Title(未定)</h1>

        @guest
            <span>非ログインユーザー  </span><br>
            {{-- 非ログインユーザー --}}
            <a href="{{ route('login') }}" class="btn btn-brown btn-md" role="button">
                <i class="fas fa-sign-in-alt"></i>
                ログイン
            </a>
            <a href="{{ route('register') }}" class="btn btn-brown btn-md" role="button">ユーザー登録</a>
            <br>
        @endguest
        
    </div>
</header>
