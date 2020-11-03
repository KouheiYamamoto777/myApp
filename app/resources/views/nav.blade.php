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

        @auth
            <span>ログインユーザータイムラインプルダウン  </span><br>
            {{-- ログインユーザータイムラインプルダウン --}}
            <a href="{{ route('profile.show_profile', ['id' => 2]) }}" class="btn btn-brown btn-md" role="button">マイページ</a>
            <a href="" class="btn btn-brown btn-md" role="button">
                <i class="fas fa-sign-out-alt"></i>
                ログアウト
            </a>
            <br>
        @endauth

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
            <a href="" class="btn btn-brown btn-md" role="button">
                <i class="fas fa-sign-out-alt"></i>
                ログアウト
            </a>
            <br>
        @endauth

        @auth
            
            <span>プロフィールカスタム画面プルダウン  </span><br>
            {{-- プロフィールカスタム画面プルダウン --}}
            <a href="" class="btn btn-brown btn-md" role="button">保存して終了</a>
            <a href="{{ route('profile.show_profile', ['id' => 2]) }}" class="btn-outline-danger waves-effect btn btn-md" role="button">
                <i class="fas fa-exclamation-triangle"></i>
                保存せず終了
            </a>
            <br>
        @endauth

        @auth
        <span>記録画面プルダウン  </span><br>
        {{-- 記録画面プルダウン --}}
        <a href="" class="btn btn-brown btn-md" role="button">記録して終了</a>
        <a href="" class="btn btn-brown btn-md" role="button">更新して終了</a>
        <a href="{{ route('profile.show_profile', ['id' => 2]) }}" class="btn-outline-danger waves-effect btn btn-md" role="button">
            <i class="fas fa-exclamation-triangle"></i>
            記録・更新せず終了
        </a>            
        @endauth
        
    </div>
</header>
