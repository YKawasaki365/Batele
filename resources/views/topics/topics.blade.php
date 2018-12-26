<!-- <<部品>>トップページのトピック一覧部分  -->
<!-- ベースはmicroposts.blade -->


<ul class="media-list">
    {{ $topics->render('pagination::bootstrap-4') }}
    @foreach ($topics as $topic)
                <div>
                    <h3>{{$topic->id}}：{!! nl2br(e($topic->title)) !!}</h3>
                    <h5>Aサイド</h5>
                    <p>{!! nl2br(e($topic->a0_item)) !!}</p>
                    <p>{!! nl2br(e($topic->a1_item)) !!}</p>
                    <p>{!! nl2br(e($topic->a2_item)) !!}</p>
                    <p>{!! nl2br(e($topic->a3_item)) !!}</p>
                    <p>{!! nl2br(e($topic->a4_item)) !!}</p>
                    <h5>Bサイド</h5>
                    <p>{!! nl2br(e($topic->b0_item)) !!}</p>
                    <p>{!! nl2br(e($topic->b1_item)) !!}</p>
                    <p>{!! nl2br(e($topic->b2_item)) !!}</p>
                    <p>{!! nl2br(e($topic->b3_item)) !!}</p>
                    <p>{!! nl2br(e($topic->b4_item)) !!}</p>
    @if (Auth::check())
        @if ( $topic ->b0_item == '' )
            <li class="nav-item">{!! link_to_route('topics.edit', '反論書き込み', ['id' => $topic->id], ['class' => 'btn btn-primary btn-block']) !!}</li>
        @endif
    @endif
                </div>
    @endforeach
    {{ $topics->render('pagination::bootstrap-4') }}
</ul>