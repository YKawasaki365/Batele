<!-- <<部品>>トップページのトピック一覧部分  -->
<!-- 本体部分はwelcome.blade -->

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
            .col-item2 {
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
                background-color: white;
            }

            .space {
                margin: 1%;
            }

            .A-side {
                    border: 2px solid #898a8e;
                    border-radius:10px;
                    width: 100%;
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
                    margin: 6%;
                    margin-top: 4%;
                    margin-left: 10%;
                    background-color: #e0ced8;
            }

            @media (max-width: 414px) {
                .B-side {
                    margin-left: 20%;
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
                    background-color: white;
            }
/* 21px or */
            .col-item2 {
                    width: 95%;
                    height: 20%;
                    background-color: white;
            }

        </style>
    </head>

    <body>
    {{ $topics->render('pagination::bootstrap-4') }}
        @foreach ($topics as $topic)
            <div class="container mb-5 box-outer alert alert-dark">

                    <!-- タイトル -->
                    <div class="row">
                        <span class="col-2 space alert"><h5>TOPIC {{$topic->id}}：</h5></span>
                        <span class="col-md-6.5 top space alert"><h5>{!! nl2br(e($topic->title)) !!}</h5></span>
                    </div>
                    <!--投稿者名-->
                    <div class="row">
                        <div class="col-md-2 offset-md-2 top">{!! nl2br(e($topic->a0_item)) !!}</div>
                        <div class="col-md-2 offset-md-4 top">{!! nl2br(e($topic->b0_item)) !!}</div>
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
                                        <div class="col-11 .col-md-6 B-side alert alert-danger">陣営Bの名称:
                                                <p class="col-item1">{!! nl2br(e($topic->b1_item)) !!}</p>B側主張:
                                                <p class="col-item2">{!! nl2br(e($topic->b2_item)) !!}</p>B側の肯定理由・メリット:
                                                <p class="col-item2">{!! nl2br(e($topic->b3_item)) !!}</p>A側の否定理由・デメリット:
                                                <p class="col-item2">{!! nl2br(e($topic->b4_item)) !!}</p>
                                        </div>
                                    </aside>
                                </div>
                        </div>
                    </div>
                            @if (Auth::check())
                                @if ( $topic ->b0_item == '' )
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-auto mb-4" >{!! link_to_route('topics.edit', '反論書き込み', ['id' => $topic->id], ['class' => 'btn btn-primary btn-block']) !!}</div>
                                    </div>
                                @endif
                            @endif
            </div>
        @endforeach
        {{ $topics->render('pagination::bootstrap-4') }}


        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS, then Font Awesome -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
    </body>
</html>