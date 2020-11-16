@extends('app')

@section('title', 'ユーザー登録')

@section('content')

    <div class="container">

        <h1 class="text-center my-4">Title</h1>

            <div class="card">

                <h2 class="h4 card-header info-color white-text text-center py-4 mb-4">
                    ユーザー登録
                </h2>

                <div class="card-body px-lg-5 pt-0">
                    <form action="{{ route('register') }}" method="post" class="text-center">
                        @csrf

                        @include('error_card')

                        <div class="md-form mt-0">
                            <label for="registerFormName">
                                お名前
                            </label>
                            <input type="text" name="name" id="registerFormName" class="form-control" required value="{{ old('name') }}">
                            <small id="registerFormNameHelpBlock" class="form-text text-muted mb-4">
                                登録後の変更は出来ません
                            </small>
                        </div>

                        <div class="md-form mt-0">
                            <label for="registerFormEmail">
                                メールアドレス
                            </label>
                            <input type="email" name="email" id="registerFormEmail" class="form-control" required value="{{ old('email') }}">
                        </div>

                        <div class="md-form">
                            <label for="registerFormPassword">
                                パスワード
                            </label>
                            <input type="password" name="password" id="registerFormPassword" class="form-control" required>
                            <small id="registerFormPasswordHelpBlock" class="form-text text-muted mb-4">
                                このメッセージは変更予定です
                            </small>
                        </div>

                        <div class="md-form">
                            <label for="registerFormPassword">
                                確認用パスワード
                            </label>
                            <input type="password" name="password_confirmation" id="registerFormPasswordConfirmation" class="form-control" required>
                        </div>
                
                        <button class="btn btn-outline-info btn-rounded btn-block mt-4 mb-3 waves-effect z-depth-0" type="submit">登録する</button>
                    </form>

                    <div class="text-center">
                        <a href="{{ route('login') }}">ログインはこちら</a>
                    </div>
                </div>
            </div>
    </div>
@endsection
