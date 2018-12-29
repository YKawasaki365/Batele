<!-- <<本体>>トピック投稿ページ """トピック投稿p""" -->

@extends('layouts.app')

@section('content')
<div class="text-center"><h3>新規作成</h3></div>

    <div class="row">
        <div class="col-sm-8">  <!-- 新規作成=store() -->
            {!! Form::open(['route' => 'topics.store']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'トピックタイトル（30字まで）：') !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                    {!! Form::label('a0_item', '投稿者の表示名（10字まで）：') !!}
                    {!! Form::text('a0_item', old('a0_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('a1_item', '陣営Aの名称（10字まで）：') !!}
                    {!! Form::text('a1_item', old('a1_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('a2_item', 'A側主張（60字まで）：') !!}
                    {!! Form::text('a2_item', old('a2_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('a3_item', 'A側の肯定理由・メリット（60字まで）：') !!}
                    {!! Form::text('a3_item', old('a3_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('a4_item', 'B側の否定理由・デメリット（60字まで）：') !!}
                    {!! Form::text('a4_item', old('a4_item'), ['class' => 'form-control']) !!}
                </div>
        </div>
    </div>

    <div class="text-center">
        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

@endsection