<!-- <<部品>>トップページのトピック一覧部分  -->
<!-- ベースはmicroposts.blade -->


<ul class="media-list">
    @foreach ($topics as $topic)
                <div>
                    <p>{!! nl2br(e($topic->title)) !!}</p>
                    <p>{!! nl2br(e($topic->a0_item)) !!}</p>
                    <p>{!! nl2br(e($topic->a1_item)) !!}</p>
                </div>
    @endforeach
</ul>