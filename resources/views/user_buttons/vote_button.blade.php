<!-- <<部品>>投票ボタン -->

<!-- @if (Auth::user()->is_voting($topic->id))
    !! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unfavorite', ['class' => "btn btn-success btn-block"]) !!}
    !! Form::close() !!}
@else
-->
    {!! Form::open(['route' => ['votes.vote', $vote->id]]) !!}
        {!! Form::submit('Vote', ['class' => "btn btn-warning btn-block"]) !!}
    {!! Form::close() !!}
<!-- @endif
-->