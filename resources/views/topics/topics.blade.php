<!-- トップページ2種のトピック一覧部分 -->

<ul class="media-list">
    @foreach ($topics as $topic)
        <li class="media mb-3">
            <img class="media-object rounded" src="{{ Gravatar::src($user->email, 50) }}" alt="">
            <div class="media-body ml-3">
                <div>
                    {!! link_to_route('users.show', $topic->user->name, ['id' => $topic->user->id]) !!} <span class="text-muted">posted at {{ $topic->created_at }}</span>
                </div>
                <div>
                    <p>{!! nl2br(e($topic->title)) !!}</p>
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->render('pagination::bootstrap-4') }}