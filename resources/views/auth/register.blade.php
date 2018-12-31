<!-- <<本体>>ユーザー登録ページ """ユーザー登録p""" -->

@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h2>ユーザー登録</h2>
    </div>

    <div class="row justify-content-md-center">
        <div class="col-sm-6">

            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'Password（6文字以上）') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password_confirmation', 'Confirmation') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('登録', ['class' => 'btn btn-warning btn-block']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection