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

/* メディアクエリ～フォントサイズ調整　414/768/1024以下 */
            body {
                font-size:16px;
            }
            .top {
                    font-size:95%;
            }
            .col-item1 {
                    font-size:100%;
            }
            .col-item11 {
                    font-size:100%;
            }
            .col-item2 {
                    font-size:130%;
            }
            .col-item22 {
                    font-size:130%;
            }

            @media (max-width: 1024px) {
                body{
                    font-size:15px;
                }
                .top {
                    font-size:80%;
                }
                .col-item1 {
                    font-size:95%;
                }
                .col-item2 {
                    font-size:115%;
                }
            }

            @media (max-width: 768px) {
                body{
                    font-size:15px;
                }
                .top {
                    font-size:80%;
                }
                .col-item1 {
                    font-size:85%;
                }
                .col-item2 {
                    font-size:110%;
                }
            }

            @media (max-width: 414px) {
                body{
                    font-size:13px;
                }
                .top {
                    font-size:70%;
                }
                .col-item1 {
                    font-size:30%;
                }
                .col-item2 {
                    font-size:60%;
                }
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
                border-radius:20px;
                margin-top: 3%;
                margin-bottom: 2%;
            }

            .top {
                border: 2px solid #898a8e;
                border-radius:5px;
                background-color: #b6b7ba;
            }

            .space {
                margin: 1%;
            }

            .A-side {
                    border: 2px solid #898a8e;
                    border-radius:10px;
                    width: 95%;
                    height: 95%;
                    margin: 6%;
                    margin-top: 4%;
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
                    margin-left: 3%;
                    background-color: #e0ced8;
            }

            @media (max-width: 414px) {
                .B-side {
                    margin-left: 5%;
                }
            }
/*
            .col-item0 {
                    width: 40%;
                    height: 6%;
                    background-color: white;
            }
*/
            .col-item1 {
                    width: 40%;
                    height: 7%;
                    background-color: #b6b7ba;
            }

            .col-item11 {
                    width: 60%;
                    height: 7%;
                    margin-bottom: 10%;
            }

            .col-item2 {
                    width: 95%;
                    height: 20%;
                    background-color: #b6b7ba;
            }

            .col-item22 {
                    width: 95%;
                    height: 20%;
                    margin-bottom: 9%;
            }

        </style>


    <div class="text-center"><h3>反論書き込み</h3></div>

            <div class="container mb-5 box-outer alert alert-dark">
                {!! Form::open(['route' => ['topics.update', $topic->id], 'method' => 'put']) !!}
                <div class="form-group">
                    <!-- タイトル -->
                    <div class="row">
                        <span class="col-2 space alert"><h5>TOPIC {{$topic->id}}：</h5></span>
                        <span class="col-md-6.5 top space alert"><h5>{!! nl2br(e($topic->title)) !!}</h5></span>
                    </div>
                    <!--投稿者名-->
                    <div class="row">
                        <div class="col-md-2 offset-md-1 top">{!! nl2br(e($topic->a0_item)) !!}</div>
                        <div class="col-md-3 offset-md-4">
                            {!! Form::label('b0_item', '投稿者の表示名（10字まで）：') !!}
                            {!! Form::text('b0_item', old('b0_item'), ['class' => 'form-control']) !!}
                        </div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">

                                <div class="row" id="wrapper">
                                    <!-- A側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 A-side alert alert-success">陣営Aの名称:
                                                <p class="col-item1">{!! nl2br(e($topic->a1_item)) !!}</p>A側主張:
                                                <p class="col-item2">{!! nl2br(e($topic->a2_item)) !!}</p>A側の肯定理由・メリット:
                                                <p class="col-item2">{!! nl2br(e($topic->a3_item)) !!}</p>B側の否定理由・デメリット:
                                                <p class="col-item2">{!! nl2br(e($topic->a4_item)) !!}</p>
                                        </div>
                                    </aside>

                                    <!-- B側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 B-side alert alert-danger">
                                                <p class="col-item11">
                                                    陣営Bの名称（10字まで）：
                                                    {!! Form::text('b1_item', old('b1_item'), ['class' => 'form-control']) !!}
                                                </p>
                                                <p class="col-item22">
                                                    B側主張（60字まで）：
                                                    {!! Form::textarea('b2_item', old('b2_item'), ['class' => 'form-control', 'rows' => 3]) !!}
                                                </p>
                                                <p class="col-item22">
                                                    B側の肯定理由・メリット（60字まで）：
                                                    {!! Form::textarea('b3_item', old('b3_item'), ['class' => 'form-control', 'rows' => 3]) !!}
                                                </p>
                                                <p class="col-item22">
                                                    A側の否定理由・デメリット（60字まで）：
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