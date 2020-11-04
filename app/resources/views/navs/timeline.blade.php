<header>
    <div class="container">
        <h1>Title(未定)</h1>

        @auth
            <span>ログインユーザータイムラインプルダウン  </span><br>
            {{-- ログインユーザータイムラインプルダウン --}}
            <a href="{{ route('profile.show_profile', ['id' => 2]) }}" class="btn btn-brown btn-md" role="button">マイページ</a>
            <button class="btn btn-brown btn-md" role="button" type="submit" form="logout-button">
                <i class="fas fa-sign-out-alt"></i>
                ログアウト
            </button>
            <form action="{{ route('logout') }}" method="post" id="logout-button">
                @csrf
            </form>
            <br>
        @endauth

    </div>
</header>
