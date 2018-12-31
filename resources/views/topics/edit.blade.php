<!-- <<本体>>反論書き込みページ """反論書き込みp""" -->

@extends('layouts.app')

@section('content')

        <style>
            .row div {
                text-align: left;
            }

            aside {
                width: 50%;
            }

/* メディアクエリ～フォントサイズ調整　320/375/414/768/1024以下 */
            body {
                font-size: 16px;
            }
            .topic-num {
                    font-size: 18px;
            }
            .topic-title {
                    width: 510px;
                    font-size: 18px;
                    margin-left: 140px;
                    background-color: #b6b7ba;
            }
            .A-name {
                    width: 180px;
                    font-size: 16px;
                    margin-left: 170px;
            }
            .B-name {
                    width: 230px;
                    font-size: 15px;
                    margin-left: 320px;
            }
            .col-A1 {
                    width: 45%;
                    height: 7%;
                    font-size:16px;
                    background-color: #b6b7ba;
            }
            .col-B1 {
                    width: 60%;
                    height: 7%;
                    font-size: 15px;
                    margin-bottom: 10%;
            }
            .col-A2 {
                    width: 95%;
                    height: 20%;
                    font-size: 21px;
                    background-color: #b6b7ba;
            }
            .col-B2 {
                    width: 95%;
                    height: 20%;
                    font-size: 17px;
                    margin-bottom: 10%;
            }

            @media (max-width: 1024px) {
                body {font-size:15px;}
                .topic-num {font-size:100%;}
                .topic-title {font-size:110%; margin-left:70px;}
                .A-name {width:180px; font-size:110%; margin-left:130px;}
                .B-name {font-size:100%; margin-left:240px;}
                .col-A1 {font-size:100%;}
                .col-A2 {font-size:115%;}
            }

            @media (max-width: 768px) {
                body {font-size:15px;}
                .topic-num {font-size:100%;}
                .topic-title {font-size:90%; width:45%; margin-bottom:10px; margin-left:50px;}
                .A-name {width:160px; font-size:100%; margin-left:90px;}
                .B-name {width:190px; font-size:90%; margin-left:125px;}
                .col-A1 {font-size:75%;}
                .col-B1 {font-size:80%; margin-bottom: 15%;}
                .col-A2 {font-size:100%;}
                .col-B2 {font-size:85%; margin-bottom: 14%;}
            }

            @media (max-width: 414px) {
                body {font-size:11px;}
                .topic-num {font-size:100%; margin-left:5px;}
                .topic-title {font-size:90%; width:45%; margin-left:0px;}
                .A-name {width:30%; margin:9px; margin-left:35px; font-size:80%;}
                .B-name {width:36%; margin:9px; margin-left:48px; font-size:60%;}
                .col-A1 {width: 55%; font-size: 70%;}
                .col-B1 {width: 80%; font-size:80%; margin-bottom: 36%;}
                .col-A2 {width: 100%; height: 21%; font-size:50%;}
                .col-B2 {width: 105%; height: 23%; font-size:90%; margin-bottom: 25%;;}
            }

            @media (max-width: 320px) {
                body {font-size:8px;}
                .topic-num {font-size:100%; margin-left:3px;}
                .topic-title {font-size:90%; width:45%; margin-left:0px;}
                .A-name {width:26%; margin:9px; margin-left:30px; font-size:70%;}
                .B-name {width:28%; margin:9px; margin-left:46px; font-size:60%;}
                .col-A1 {width: 85%; height:30px; font-size: 70%; margin-bottom: 10px;}
                .col-B1 {width: 100%; height:0px; font-size:80%; margin-bottom: 100%;}
                .col-A2 {width: 100%; height:22%; font-size:50%; margin-bottom: 10px;}
                .col-B2 {width: 100%; height:22%; font-size:90%; margin-bottom: 23%;;}
                .A-side{padding:7px;}
                .B-side{padding:10px;}
            }

            .row-title {
                text-align: center;
            }

            #wrapper {
                width: 100%;
                height: 550px;
            }

            .box-outer {
                border: 2px solid #898a8e;
                border-radius: 20px;
                margin-top: 3%;
                margin-bottom: 2%;
            }

            .topic-title {
                border: 2px solid #898a8e;
                border-radius: 5px;
                background-color: #b6b7ba;
                margin-bottom: 10px;
            }

            .A-name {
                border: 2px solid #898a8e;
                border-radius: 5px;
                background-color: #b6b7ba;
            }

            .space {
                margin: 1%;
                margin-left: 2%;
            }

            .icon {
                font-size:28px;
                margin-right:10px;
            }

            .A-side {
                    border: 2px solid #898a8e;
                    border-radius:10px;
                    width: 95%;
                    height: 95%;
                    margin: 6%;
                    margin-top: 4%;
                    margin-left: 7%;
                    background-color: #bbeda6;
            }

/* メディアクエリ～B枠位置調整　414以下 */
            .B-side {
                    border: 2px solid #898a8e;
                    border-radius:10px;
                    width: 100%;
                    height: 95%;
                    margin: 2%;
                    margin-top: 4%;
                    margin-left: 7%;
                    background-color: #e0ced8;
            }

            @media (max-width: 414px) {
                .B-side {
                    margin-left: 13%;
                }
            }

        </style>

            <div class="container headlines">
                <div class="row justify-content-md-center">
                    <span class="icon"><i class="fas fa-edit"></i></span>
                    <span><h2>反論書き込み</h2></span>
                </div>
            </div>

            <div class="container mb-5 box-outer alert alert-dark">
                {!! Form::open(['route' => ['topics.update', $topic->id], 'method' => 'put']) !!}
                <div class="form-group">
                    <!-- タイトル -->
                    <div class="row">
                        <span class="space alert topic-num">TOPIC {{$topic->id}}</span>
                        <span class="offset-md-1 topic-title">{!! nl2br(e($topic->title)) !!}</span>
                    </div>
                    <!--投稿者名-->
                    <div class="row">
                        <div class="offset-md-1 A-name">{!! nl2br(e($topic->a0_item)) !!}</div>
                        <div class="offset-md-3 B-name">
                            投稿者の表示名（10字まで）:
                            {!! Form::textarea('b0_item', old('b0_item'), ['class' => 'form-control', 'rows' => 1, 'cols' => 24]) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                                <div class="row" id="wrapper">
                                    <!-- A側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 A-side alert alert-success">陣営Aの名称:
                                                <p class="col-A1">{!! nl2br(e($topic->a1_item)) !!}</p>A側主張:
                                                <p class="col-A2">{!! nl2br(e($topic->a2_item)) !!}</p>A側の肯定理由・メリット:
                                                <p class="col-A2">{!! nl2br(e($topic->a3_item)) !!}</p>B側の否定理由・デメリット:
                                                <p class="col-A2">{!! nl2br(e($topic->a4_item)) !!}</p>
                                        </div>
                                    </aside>

                                    <!-- B側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 B-side alert alert-danger">
                                                <p class="col-B1">
                                                    陣営Bの名称（10字まで）:
                                                    {!! Form::textarea('b1_item', old('b1_item'), ['class' => 'form-control', 'rows' => 1]) !!}
                                                </p>
                                                <p class="col-B2">
                                                    B側主張（60字まで）:
                                                    {!! Form::textarea('b2_item', old('b2_item'), ['class' => 'form-control', 'rows' => 3]) !!}
                                                </p>
                                                <p class="col-B2">
                                                    B側の肯定理由・メリット（60字まで）:
                                                    {!! Form::textarea('b3_item', old('b3_item'), ['class' => 'form-control', 'rows' => 3]) !!}
                                                </p>
                                                <p class="col-B2">
                                                    A側の否定理由・デメリット（60字まで）:
                                                    {!! Form::textarea('b4_item', old('b4_item'), ['class' => 'form-control', 'rows' => 3]) !!}
                                                </p>
                                        </div>
                                    </aside>
                                </div>
                        </div>
                    </div>
                        <div class"row justify-content-md-center">
                            <div class="text-center col-md-auto">
                                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>

                </div>
            </div>


@endsection