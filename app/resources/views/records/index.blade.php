@extends('app')

@section('title')
    ようこそ
@endsection

@section('content')
    @include('navs.timeline')

    <div class="container my-4">
        @forelse ($posts as $post)
            @include('card')
        @empty
            <h2 class="font-weight-normal mt-2 indigo-text">記録をつけましょう</h2>

            <div class="ml-4">
                <p class="h4 my-4">投稿された記録を見ることができます</p>
                <ol>
                    <li>画面上部ナビバーから記録ページへ移動します。</li>
                    <li>今月の収入とクレジットカードの使用額を入力します。</li>
                    <li>記録が保存され、投稿されます。</li>
                </ol>
                <p class="h4 my-4">プロフィールをカスタムできます</p>
                <ul>
                    <li>アイコン画像を設定できます。</li>
                    <li>コメントを変更できます。</li>
                    <li>クレジットカードの目標上限額を設定できます。</li>
                    <li>素敵なプロフィールを完成させましょう。</li>
                </ul>
            </div>
        @endforelse
    </div>

@endsection
