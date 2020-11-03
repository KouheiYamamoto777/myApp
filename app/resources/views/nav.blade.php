<div class="container">
    <header>
        <h1>Title(未定)</h1>

        {{-- 非ログインユーザー --}}
        <a href="{{ route('login') }}" class="btn btn-brown btn-sm" role="button">ログイン</a>
        <a href="{{ route('register') }}" class="btn btn-brown btn-sm" role="button">ユーザー登録</a>
        <br>

        {{-- ログインユーザータイムラインプルダウン --}}
        <a href="" class="btn btn-brown btn-sm" role="button">マイページ</a>
        <a href="" class="btn btn-brown btn-sm" role="button">ログアウト</a>
        <br>

        {{-- ログインユーザープロフィール画面表示+プルダウン --}}
        <a href="" class="btn btn-brown btn-sm" role="button">記録</a>
        <a href="" class="btn btn-brown btn-sm" role="button">タイムライン</a>
        <a href="" class="btn btn-brown btn-sm" role="button">カスタム</a>
        <a href="" class="btn btn-brown btn-sm" role="button">ログアウト</a>
        <br>

        {{-- プロフィールカスタム画面プルダウン --}}
        <a href="" class="btn btn-brown btn-sm" role="button">保存して終了</a>
        <a href="" class="btn btn-brown btn-sm" role="button">保存せず終了</a>
        <br>
        
        {{-- 記録画面プルダウン --}}
        <a href="" class="btn btn-brown btn-sm" role="button">記録して終了</a>
        <a href="" class="btn btn-brown btn-sm" role="button">更新して終了</a>
        <a href="" class="btn btn-brown btn-sm" role="button">記録・更新せず終了</a>
        
    </header>
</div>
