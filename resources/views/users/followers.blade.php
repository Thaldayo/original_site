@extends('layouts.app')

@section('content')
    {{-- タブ --}}
    @include('users.navtabs')
    <div class="row">
        <aside class="col-3">
            {{-- ユーザ情報 --}}
            @include('users.card')
            
            {{-- 投稿ボタン --}}
            @include('button.post_btn')
        </aside>
        <div class="col-9">
            {{-- ユーザ一覧 --}}
            @include('users.users')
        </div>
    </div>
@endsection