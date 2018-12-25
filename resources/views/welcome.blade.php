<!-- <<本体>>トップページ """トップp_guest/member""" -->
<!-- トピック一覧のトピック部分はtopics/topics.blade -->


@extends('layouts.app')

@section('content')
    <div class="row">
        @include('topics.topics', ['topics' => $topics])
    </div>
@endsection