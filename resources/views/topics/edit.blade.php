<!-- <<本体>>トピック投稿ページ """トピック投稿p""" -->

@extends('layouts.app')

@section('content')
<div class="text-center"><h3>新規作成</h3></div>

    <div class="row">
        <div class="col-sm-8">  <!-- 新規作成=store() -->
            {!! Form::open(['route' => 'topics.store']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'トピックタイトル:') !!}
                    {!! Form::text('title', old('title'), ['class' => 'form-control']) !!}
                    {!! Form::label('a0_item', '投稿者の表示名:') !!}
                    {!! Form::text('a0_item', old('a0_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('a1_item', '陣営Aの名称:') !!}
                    {!! Form::text('a1_item', old('a1_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('a2_item', 'A側主張:') !!}
                    {!! Form::text('a2_item', old('a2_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('a3_item', 'A側の肯定理由・メリット:') !!}
                    {!! Form::text('a3_item', old('a3_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('a4_item', 'B側の否定理由・デメリット:') !!}
                    {!! Form::text('a4_item', old('a4_item'), ['class' => 'form-control']) !!}
                </div>
        </div>
    </div>

    <div class="text-center">
        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>


<div class="text-center"><h3>反論書き込み</h3></div>

    <div class="row">
        <div class="col-sm-8">  <!-- 更新処理=update() -->
            {!! Form::open(['route' => ['topics.update', $topic->id], 'method' => 'put']) !!}
                <div class="form-group">
                    {!! Form::label('b0_item', '投稿者の表示名:') !!}
                    {!! Form::text('b0_item', old('b0_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('b1_item', '陣営Bの名称:') !!}
                    {!! Form::text('b1_item', old('b1_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('b2_item', 'B側主張:') !!}
                    {!! Form::text('b2_item', old('b2_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('b3_item', 'B側の肯定理由・メリット:') !!}
                    {!! Form::text('b3_item', old('b3_item'), ['class' => 'form-control']) !!}
                    {!! Form::label('b4_item', 'A側の否定理由・デメリット:') !!}
                    {!! Form::text('b4_item', old('b4_item'), ['class' => 'form-control']) !!}
                </div>
        </div>
    </div>

    <div class="text-center">
        {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    </div>

@endsection