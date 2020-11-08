<div class="card mb-3">
    <div class="card-body">
        <h4 class="card-title mb-4">{{ $post->title }}/ <span class="h6 text-muted">{{ $post->user->name }}</span></h4>
        <h6 class="card-subtitle mb-2 text-muted">{{ '20' . $post->year . '年' . $post->month . '月' }}の記録</h6>
        <p class="card-text">{!! nl2br(e($post->body)) !!}</p>
    </div>
</div>
