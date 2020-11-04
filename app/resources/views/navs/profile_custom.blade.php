<header>
    <div class="container">
        <h1>Title(未定)</h1>
        
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
        
    </div>
</header>
