<!-- <<本体>>トピック投稿ページ """トピック投稿p""" -->

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
            }
            .A-name {
                    width: 200px;
                    font-size: 15px;
                    margin-left: 170px;
            }
            .B-name {
                    width: 230px;
                    font-size: 16px;
                    margin-left: 300px;
            }
            .col-A1 {
                    width: 60%;
                    height: 7%;
                    font-size: 15px;
                    margin-bottom: 8%;
            }
            .col-B1 {
                    width: 45%;
                    height: 7%;
                    font-size:16px;
                    background-color: #b6b7ba;
            }
            .col-A2 {
                    width: 95%;
                    height: 20%;
                    font-size: 17px;
                    margin-bottom: 10%;
            }
            .col-B2 {
                    width: 95%;
                    height: 20%;
                    font-size: 21px;
                    background-color: #b6b7ba;
            }

            @media (max-width: 1024px) {
                body {font-size:15px;}
                .topic-title {width:50%; margin-left:80px;}
                .A-name {font-size:90%; margin-left:130px;}
                .B-name {width:17%; font-size:100%; margin-left:250px;}
                .col-A1 {font-size:100%; margin-bottom: 12%;}
                .col-B1 {font-size:100%;}
                .col-A2 {font-size:110%;}
                .col-B2 {font-size:115%;}
            }

            @media (max-width: 768px) {
                body {font-size:15px;}
                .topic-num {font-size:110%;}
                .topic-title {font-size:110%; width:45%; margin-bottom:10px; margin-left:40px;}
                .A-name {width:180px; font-size:90%; margin-left:80px;}
                .B-name {font-size:100%; margin-left:165px;}
                .col-A1 {font-size:80%; margin-bottom: 15%;}
                .col-B1 {font-size:75%;}
                .col-A2 {font-size:85%; margin-bottom: 14%;}
                .col-B2 {font-size:100%;}
            }

            @media (max-width: 414px) {
                body {font-size:11px;}
                .topic-num {font-size:100%; margin-left:5px;}
                .topic-title {font-size:100%; width:45%; margin-left:0px;}
                .A-name {width:38%; margin:9px; margin-left:20px; font-size:80%;}
                .B-name {width:31%; margin:9px; margin-left:42px; font-size:100%;}
                .col-A1 {width: 80%; font-size:80%; margin-bottom: 36%;}
                .col-B1 {width: 70%; font-size: 70%;}
                .col-A2 {width: 105%; height: 23%; font-size:90%; margin-bottom: 25%;;}
                .col-B2 {width: 100%; height: 21%; font-size:50%;}
            }

            @media (max-width: 375px) {
                body {font-size:10px;}
                .topic-num {font-size:100%; margin-left:5px;}
                .topic-title {font-size:70%; width:45%; margin-left:0px;}
                .A-name {width:34%; margin:9px; margin-left:20px; font-size:80%;}
                .B-name {width:31%; margin:11px; margin-left:45px; font-size:90%;}
                .col-A1 {width: 95%; height:1%; font-size:70%; margin-bottom: 70%;}
                .col-B1 {width: 85%; height:5%; font-size:70%;}
                .col-A2 {width: 105%; height: 20%; font-size:70%; margin-bottom: 35%;}
                .col-B2 {width: 105%; height: 20%; font-size:70%;}
            }

            @media (max-width: 320px) {
                body {font-size:10px;}
                .topic-num {font-size:100%; width:70px; margin-left:5px;}
                .topic-title {font-size:90%; width:150px; margin-left:0px;}
                .A-name {width:34%; margin:9px; margin-left:20px; font-size:80%;}
                .B-name {width:31%; margin:11px; margin-left:30px; font-size:90%;}
                .col-A1 {width: 95%; height:1%; font-size:70%; margin-bottom: 80%;}
                .col-B1 {width: 95%; height:4%; font-size: 70%;}
                .col-A2 {width: 100%; height: 20%; font-size:90%; margin-bottom: 35%;}
                .col-B2 {width: 100%; height: 21%; font-size:50%;}
                .A-side {padding:8px;}
                .B-side {padding:8px;}
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

            .B-name {
                border: 2px solid #898a8e;
                border-radius:5px;
                background-color: #b6b7ba;
            }

            .space {
                margin: 1%;
                margin-left: 2%;
            }

            .A-side {
                    border: 2px solid #898a8e;
                    border-radius:10px;
                    width: 95%;
                    height: 95%;
                    margin: 6%;
                    margin-top: 4%;
                    margin-left: 8%;
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
                    margin-left: 6%;
                    background-color: #e0ced8;
            }

            @media (max-width: 414px) {
                .B-side {
                    margin-left: 13%;
                }
            }

        </style>

    <div class="text-center"><h3>新規投稿</h3></div>

            <div class="container mb-5 box-outer alert alert-dark">
                {!! Form::open(['route' => 'topics.store']) !!}
                <div class="form-group">
                    <!-- タイトル -->
                    <div class="row">
                        <span class="space alert topic-num">TOPIC No.</span>
                            <span class="offset-md-1 topic-title">
                                    トピックタイトル（30字まで）:
                                    {!! Form::textarea('title', old('title'), ['class' => 'form-control', 'rows' => 1, 'cols' => 70]) !!}
                            </span>
                    </div>
                    <!--投稿者名-->
                    <div class="row">
                        <div class="offset-md-1 A-name">
                            投稿者の表示名（10字まで）:
                            {!! Form::textarea('a0_item', old('a0_item'), ['class' => 'form-control', 'rows' => 1, 'cols' => 24]) !!}
                        </div>
                        <div class="offset-md-3 B-name"></div>
                    </div>
                
                    <div class="row">
                        <div class="col-md-12">

                                <div class="row" id="wrapper">
                                    <!-- A側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 A-side alert alert-success">
                                                <p class="col-A1">
                                                    陣営Aの名称（10字まで）:
                                                    {!! Form::textarea('a1_item', old('a1_item'), ['class' => 'form-control', 'rows' => 1]) !!}
                                                </p>
                                                <p class="col-A2">
                                                    A側主張（60字まで）:
                                                    {!! Form::textarea('a2_item', old('a2_item'), ['class' => 'form-control', 'rows' => 3]) !!}
                                                </p>
                                                <p class="col-A2">
                                                    A側の肯定理由・メリット（60字まで）:
                                                    {!! Form::textarea('a3_item', old('a3_item'), ['class' => 'form-control', 'rows' => 3]) !!}
                                                </p>
                                                <p class="col-A2">
                                                    B側の否定理由・デメリット（60字まで）:
                                                    {!! Form::textarea('a4_item', old('a4_item'), ['class' => 'form-control', 'rows' => 3]) !!}
                                                </p>
                                        </div>
                                    </aside>

                                    <!-- B側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 B-side alert alert-danger">
                                                陣営Bの名称:
                                                <p class="col-B1"></p>B側主張:
                                                <p class="col-B2"></p>B側の肯定理由・メリット:
                                                <p class="col-B2"></p>A側の否定理由・デメリット:
                                                <p class="col-B2"></p>
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