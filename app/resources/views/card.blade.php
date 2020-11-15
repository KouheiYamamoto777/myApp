<div class="card mb-3">
    <div class="card-body">

        <h4 class="card-title mb-4 h4-responsive">
            <a 
            href="{{ route('records.show', $post->id) }}"
            class="text-dark"
            >
                {{ $post->title }}
            </a>/&nbsp;<span class="h6 text-muted">{{ $post->user->name }}</span>
        </h4>

        <h6 class="card-subtitle mb-2 text-muted h6-responsive text-left">{{ '20' . $post->year . '年' . $post->month . '月' }}の記録</h6>

        <p class="card-text text-left">{!! nl2br(e($post->body)) !!}</p>

    </div>
</div>
