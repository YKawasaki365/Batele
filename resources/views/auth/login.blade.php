<!-- <<本体>>ログインページ """ログインp""" -->

@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h2>ログイン</h2>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-md-6">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('ログイン', ['class' => 'btn btn-warning btn-block']) !!}
            {!! Form::close() !!}

            <p class="mt-2">ユーザー登録はお済みですか？ {!! link_to_route('signup.get', '無料ユーザー登録') !!}</p>
        </div>
    </div>
@endsection