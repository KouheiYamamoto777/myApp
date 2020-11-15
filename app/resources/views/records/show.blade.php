@extends('app')

@section('title', '詳細画面')

@section('content')
    @include('navs.show')

    <div class="container mt-2">
        
        <div class="text-center">
            <a 
            href="{{ route('profile.show_profile', $post->id) }}" 
            class="btn mb-3">
            このユーザーの頑張りを見る
        </a>

        @include('card')

        <div>
            <h3 class="h3-responsive text-left">コメント</h3>
    
            <ul class="list-group list-group-flush text-left">
                @forelse ($comments as $comment)
                    <li 
                        class="list-group-item
                        @if ($comment->user_id === $post->user_id)
                            text-danger
                        @endif
                        "
                    >{{ $comment->comment }}</li>    
                @empty
                    <li class="list-group-item">コメントはありません</li>
                @endforelse
            </ul>

        </div>

        
        <div>
            <form action="{{ route('records.post_comment', $post->id) }}" method="post">
                @csrf
                <div class="md-form">
                    {{-- <input type="hidden" name="user_id" value="{{ Auth::id() }}"> --}}
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                </div>

                <div class="md-form text-left">
                    <input type="text" name="comment" id="comment" class="form-control">
                    <label for="comment">コメントを送ろう！</label>
                </div>

                <button class="btn btn-indigo" type="submit">コメントする</button>

            </form>
        </div>
            
    </div>
</div>

@endsection
