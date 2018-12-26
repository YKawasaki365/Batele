<!-- <<部品>>反論書き込みボタン -->
<!-- 使用予定なし -->

<!--
<li class="nav-item">{!! link_to_route('topics.edit', '反論書き込み', [], ['class' => 'nav-link']) !!}</li>
<li class="nav-item">{!! link_to_route('topics.edit', '反論書き込み', [], ['class' => 'btn btn-primary btn-block']) !!}</li>
btn btn-primary btn-block

            <div class="col-sm-8">
                @if (Auth::id() == $user->id)
                    !! Form::open(['route' => 'topics.edit']) !!}
                        <div class="form-group">
                            !! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '2']) !!}
                            !! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                    !! Form::close() !!}
                @endif
            </div>
-->