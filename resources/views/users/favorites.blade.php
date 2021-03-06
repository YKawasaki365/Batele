<!-- <<本体>>お気に入り一覧ページ """お気に入り一覧p""" -->
<!-- ・参考blade  ->  welcome.blade(型枠)、topics/topics.blade(トピック一覧) -->

@extends('layouts.app')

@section('content')

<!DOCTYPE html>

<html lang="ja">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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
                    width: 560px;
                    font-size: 20px;
                    margin-left: 150px;
            }
            .icon {
                font-size:28px;
                margin-right:8px;
            }
            .A-side {
                    width: 100%;
                    height: 95%;
                    margin: 6%;
                    margin-top: 4%;
            }
            .B-side {
                    width: 100%;
                    height: 95%;
                    margin: 6%;
                    margin-top: 4%;
                    margin-left: 10%;
            }
            .A-name {
                    width: 230px;
                    font-size: 17px;
                    margin-left: 160px;
            }
            .B-name {
                    width: 230px;
                    font-size: 17px;
                    margin-left: 345px;
            }
            .col-C1 {
                    width: 180px;
                    height: 7%;
                    font-size: 16px;
                    background-color: white;
            }
            .col-C2 {
                    width: 450px;
                    height: 20%;
                    font-size: 22px;
                    background-color: white;
            }

            @media (max-width: 1440px) {
                body{font-size:15px;}
                .topic-num {font-size:22px;}
                .topic-title {width:460px; font-size:112%; margin-left:180px;}
                .A-name {width:180px; font-size:110%; margin-left:140px;}
                .B-name {width:180px; font-size:110%; margin-left:450px;}
                .col-C1 {width: 45%; height: 7%; font-size:100%;}
                .col-C2 {width: 95%; height: 16%; font-size:115%;}
            }

            @media (max-width: 1024px) {
                body{font-size:15px;}
                .topic-num {font-size:22px;}
                .topic-title {width:420px; font-size:112%; margin-left:115px;}
                .A-name {width:180px; font-size:110%; margin-left:140px;}
                .B-name {width:180px; font-size:110%; margin-left:300px;}
                .col-C1 {width: 45%; height: 7%; font-size:90%;}
                .col-C2 {width: 95%; height: 16%; font-size:95%;}
            }

            @media (max-width: 768px) {
                body{font-size:14px;}
                .headlines {font-size:80%;}
                .topic-num {font-size:19px;}
                .topic-title {width:370px; font-size:125%; margin-left:30px;}
                .A-name {width:180px; font-size:110%; margin-left:85px;}
                .B-name {width:180px; font-size:110%; margin-left:150px;}
                .col-C1 {width: 60%; height: 5%; font-size:100%;}
                .col-C2 {width: 95%; height: 20%; font-size:110%;}
            }

            @media (max-width: 640px) {
                .topic-title {width:350px; font-size:112%; margin-left:70px;}
                .B-name {margin-left:300px;}
            }

            @media (max-width: 414px) {
                body{font-size:12px;}
                .headlines {font-size:80%;}
                .topic-num {font-size:12px;}
                .topic-title {width:180px; font-size:110%; margin-left:0px;}
                .icon {font-size:24px;}
                .A-name {width:120px; font-size:90%; margin-left:35px;}
                .B-name {width:120px; font-size:90%; margin-left:90px;}
                .col-C1 {width: 70%; height: 6%; font-size:80%;}
                .col-C2 {width: 100%; height: 20%; font-size:95%;}
                .B-side {margin-left: 20%;}
            }

            @media (max-width: 375px) {
                body{font-size:12px;}
                .topic-num {font-size:11px;}
                .topic-title {width:160px; font-size:110%; margin-left:0px;}
                .icon {font-size:20px; margin-left:0px;}
                .A-name {width:100px; font-size:90%; margin-left:25px;}
                .B-name {width:100px; font-size:90%; margin-left:75px;}
                .col-C1 {width: 80%; height: 6%; font-size:80%; margin-bottom: 5px}
                .col-C2 {width: 105%; height: 21%; font-size:80%;}
            }

            @media (max-width: 320px) {
                body{font-size:11px;}
                .topic-num {font-size:9px;}
                .topic-title {width:115px; font-size:75%; margin-left:0px;}
                .A-side {width: 120%; height: 95%; margin: 6%; margin-left: 10px; padding-left: 8px;}
                .B-side {width: 120%; height: 95%; margin: 6%; margin-left: 30px; padding-left: 8px;}
                .A-name {width: 90px; font-size: 8px; margin-left: 20px;}
                .B-name {width: 90px; font-size: 8px; margin-left: 50px;}
                .col-C1 {width: 80%; height: 6%; font-size: 6px; margin-bottom: 1px;}
                .col-C2 {width: 115%; height: 21%; font-size: 6px;}
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

            .topic-title {
                border: 2px solid #898a8e;
                border-radius:5px;
                background-color: white;
                margin-bottom: 10px;
            }

            .C-name {
                border: 2px solid #898a8e;
                border-radius: 5px;
                background-color: white;
            }

            .btn {
                border: 0px;
                font-size:20px;
            }

            .space {
                margin: 1%;
            }

            .A-side {
                    border: 2px solid #898a8e;
                    border-radius:10px;
                    background-color: #bbeda6;
            }

            .B-side {
                    border: 2px solid #898a8e;
                    border-radius:10px;
                    background-color: #e0ced8;
            }

        </style>
    </head>

    <body>


    <div class="container headlines">
        <div class="row justify-content-md-center">
                <span class="icon"><i class="far fa-list-alt"></i></span>
                <span><h2>お気に入り一覧</h2></span>
        </div>
        <div class="row justify-content-end">
            {{ $topics->render('pagination::bootstrap-4') }}
        </div>
    </div>
        @foreach ($topics as $topic)
            <div class="container mb-5 box-outer alert alert-dark">

                    <!-- タイトル -->
                    <div class="row">
                        <span class="space alert topic-num">TOPIC {{$topic->id}}</span>
                        <span class="offset-md-1 topic-title">{!! nl2br(e($topic->title)) !!}</span>
                        
                        <!-- お気に入りボタン -->
                        <span class="col-auto">
                            @if (Auth::check())
                                @include('user_buttons.favorite_button', ['topic' => $topic])
                            @endif
                        </span>
                    </div>

                    <!--投稿者名-->
                    <div class="row">
                        <div class="offset-md-1 A-name C-name">{!! nl2br(e($topic->a0_item)) !!}</div>
                        <div class="offset-md-3 B-name C-name">{!! nl2br(e($topic->b0_item)) !!}</div>
                    </div>
                    <!-- 項目部 -->
                    <div class="row">
                        <div class="col-md-12">
                                <div class="row" id="wrapper">
                                    <!-- A側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 A-side alert alert-success">陣営Aの名称:
                                                <p class="col-C1">{!! nl2br(e($topic->a1_item)) !!}</p>A側主張:
                                                <p class="col-C2">{!! nl2br(e($topic->a2_item)) !!}</p>A側の肯定理由・メリット:
                                                <p class="col-C2">{!! nl2br(e($topic->a3_item)) !!}</p>B側の否定理由・デメリット:
                                                <p class="col-C2">{!! nl2br(e($topic->a4_item)) !!}</p>
                                        </div>
                                    </aside>
                                    <!-- B側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 B-side alert alert-danger">陣営Bの名称:
                                                <p class="col-C1">{!! nl2br(e($topic->b1_item)) !!}</p>B側主張:
                                                <p class="col-C2">{!! nl2br(e($topic->b2_item)) !!}</p>B側の肯定理由・メリット:
                                                <p class="col-C2">{!! nl2br(e($topic->b3_item)) !!}</p>A側の否定理由・デメリット:
                                                <p class="col-C2">{!! nl2br(e($topic->b4_item)) !!}</p>
                                        </div>
                                    </aside>
                                </div>
                        </div>
                    </div>
                            @if (Auth::check())
                                @if ( $topic ->b0_item == '' )
                                    <div class="row justify-content-md-center">
                                        <span class="col-md-auto mb-4" >{!! link_to_route('topics.edit', '反論書き込み', ['id' => $topic->id], ['class' => 'btn btn-primary btn-block']) !!}</span>
                                    </div>
                                @endif
                            @endif
            </div>
        @endforeach

        <div class="container headlines">
            <div class="row justify-content-end">
                    {{ $topics->render('pagination::bootstrap-4') }}
            </div>
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
    </body>
</html>

@endsection
