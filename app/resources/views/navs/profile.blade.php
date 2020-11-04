<header>
    <div class="container">
        <h1>Title(未定)</h1>

        @auth
            <span>ログインユーザープロフィール画面表示 記録+プルダウン  </span><br>
            {{-- ログインユーザープロフィール画面表示+プルダウン --}}
            <p class="m-0">
                <i class="fas fa-ellipsis-v"></i>
                プルダウンアイコン
            </p>
            <a href="{{ route('records.create') }}" class="btn btn-brown btn-md" role="button">
                <i class="fas fa-file-signature"></i>
                記録
            </a>
            <a href="{{ route('records.index') }}" class="btn btn-brown btn-md" role="button">タイムライン</a>
            <a href="{{ route('profile.show_profile_custom', ['id' => 2]) }}" class="btn btn-brown btn-md" role="button">
                <i class="fas fa-cog"></i>
                カスタム
            </a>
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
