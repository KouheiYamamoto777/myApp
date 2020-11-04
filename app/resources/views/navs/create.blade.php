<header>
    <div class="container">
        <h1>Title(未定)</h1>

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
