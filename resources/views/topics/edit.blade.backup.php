<!-- <<本体>>反論書き込みページ """反論書き込みp""" -->

@extends('layouts.app')

@section('content')
<div class="text-center"><h3>反論書き込み</h3></div>

    <div class="row">
        <div class="col-sm-8">  <!-- 更新処理=update() -->
            {!! Form::open(['route' => ['topics.update', $topic->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('b0_item', '投稿者の表示名（10字まで）：') !!}
                    {!! Form::text('b0_item', old('b0_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('b1_item', '陣営Bの名称（10字まで）：') !!}
                    {!! Form::text('b1_item', old('b1_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('b2_item', 'B側主張（60字まで）：') !!}
                    {!! Form::text('b2_item', old('b2_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('b3_item', 'B側の肯定理由・メリット（60字まで）：') !!}
                    {!! Form::text('b3_item', old('b3_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('b4_item', 'A側の否定理由・デメリット（60字まで）：') !!}
                    {!! Form::text('b4_item', old('b4_item'), ['class' => 'form-control']) !!}
                </div>
        </div>
    </div>

    <div class="text-center">
        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

@endsection