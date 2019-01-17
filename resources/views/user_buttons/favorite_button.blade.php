<!-- タブ"Users"->他ユーザ"View profile"->画面全体 -->

@if (Auth::user()->is_favoring($topic->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $topic->id], 'method' => 'delete']) !!}
        <button class="btn alert-dark">
            <i class="fas fa-star btn-success"><input type="submit" value="Unfavorite"></i>
        </button>
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $topic->id]]) !!}
        <button class="btn alert-dark">
            <i class="fas fa-star btn-warning"><input type="submit" value="Favorite"></i>
        </button>
    {!! Form::close() !!}
@endif
