<!-- <<部品>>投票ボタン  -->


@if (Auth::user()->a_is_voting($topic->id))
        <!-- vote完了、ボタンdisable表記 -->
        <button class="btn alert-dark disabled">
            <i class="far fa-thumbs-up btn-success"><input type="submit" value="完了"></i>
        </button>
@else
    {!! Form::open(['route' => ['a_votes.vote', $topic->id]]) !!}
        <button class="btn alert-dark">
            <i class="far fa-thumbs-up btn-warning"><input type="submit" value="投票"></i>
        </button>
    {!! Form::close() !!}
@endif