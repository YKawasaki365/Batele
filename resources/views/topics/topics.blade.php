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
                /* #c1c1c1 */

            .box-outer {
                margin-top: 3%;
                margin-bottom: 2%;
                background-color: #f2b66d;
            }

            #wrapper {
                width: 100%;
                height: 700px;
                display: flex;
                justify-content: space-between;
            }

            .top {
                background-color: white;
            }

            .space {
                margin: 2%;
            }

            aside {
                width: 50%;
            }

            .A-side {
                    width: 100%;
                    height: 85%;
                    margin: 7%;
                    background-color: #bbeda6;
            }

            .B-side {
                    width: 100%;
                    height: 85%;
                    margin: 7%;
                    background-color: #e0ced8;
            }
/*
            .col-item0 {
                    width: 40%;
                    height: 6%;
                    background-color: white;
            }
*/
            .col-item1 {
                    font-size: 100%;
                    width: 30%;
                    height: 7%;
                    background-color: white;
            }

            .col-item2 {
                    width: 100%;
                    height: 20%;
                    background-color: white;
            }

        </style>
    </head>

    <body>
    {{ $topics->render('pagination::bootstrap-4') }}
        @foreach ($topics as $topic)
            <div class="container box-outer mb-5">

                    <!-- タイトル&投稿者名-->
                    <div class="row justify-content-md-center">
                        <span class="col-md-auto top space">aaa{{$topic->id}}：{!! nl2br(e($topic->title)) !!}</span>
                    </div>
                    <div class="row">
                            <div class="col-md-2 offset-md-1 top">{!! nl2br(e($topic->a0_item)) !!}</div>
                            <div class="col-md-2 offset-md-6 top">{!! nl2br(e($topic->b0_item)) !!}</div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">

                                <div class="row" id="wrapper">
                                    <!-- A側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 A-side border">
                                        <!-- 陣営枠以内は手打ち -->陣営Aの名称:
                                                <p class="col-item1">{!! nl2br(e($topic->a1_item)) !!}</p>A側主張:
                                                <p class="col-item2">{!! nl2br(e($topic->a2_item)) !!}</p>A側の肯定理由・メリット:
                                                <p class="col-item2">{!! nl2br(e($topic->a3_item)) !!}</p>B側の否定理由・デメリット:
                                                <p class="col-item2">{!! nl2br(e($topic->a4_item)) !!}</p>
                                        </div>
                                    </aside>

                                    <!-- B側カラム-->
                                    <aside>
                                        <div class="col-11 .col-md-6 B-side border">
                                        <!-- 陣営枠以内は手打ち -->陣営Bの名称:
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
                                        <div class="col-md-auto mb-4">{!! link_to_route('topics.edit', '反論書き込み', ['id' => $topic->id], ['class' => 'btn btn-primary btn-block']) !!}</div>
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