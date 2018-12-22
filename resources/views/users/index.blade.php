<!-- ユーザー一覧(骨格のみ。本体はusers.blade)(使用予定なし) -->

@extends('layouts.app')

@section('content')
    @include('users.users', ['users' => $users])
@endsection