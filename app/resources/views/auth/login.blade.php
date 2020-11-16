@extends('app')

@section('title', 'ログイン')

@section('content')
    <div class="container">

        <h1 class="text-center my-4">Title</h1>

        <div class="card z-depth-1-half">
            <h2 class="h5 card-header brown white-text text-center py-4">
                ログイン
            </h2>
    
            <div class="card-body px-lg-5 pt-0">
                <form action="" method="post" class="text-center">
                    @csrf
                    <div class="md-form">
                        <label for="loginFormEmail">メールアドレス</label>
                        <input type="email" name="email" id="loginFormEmail" class="form-control" required>
                    </div>
    
                    <div class="md-form">
                        <label for="loginFromPassword">パスワード</label>
                        <input type="password" name="password" id="loginFormPassword" class="form-control" required>
                    </div>
    
                    <div class="">
                        <a href="">パスワードを忘れた方はこちら</a>
                    </div>
    
                    <button class="btn btn-brown btn-block my-4 waves-effect z-depth-0" type="submit">ログインする</button>
                </form>
    
                <div class="text-center">
                    <a href="{{ route('register') }}">ユーザー登録はこちら</a>
                </div>
    
            </div>
    
        </div>
    </div>
@endsection
