@extends('layouts.app')

@section('content')
    <div>
        {{-- ナビゲーションバー --}}
        @include('users.navtabs')
    </div>
    <div class="row">
        <aside class="col-3">
            {{-- ユーザ情報 --}}
            @include('users.card')
            
            {{-- 投稿ボタン --}}
            @include('button.post_btn')
        </aside>
        <div class="col-9">
            {{-- 投稿一覧 --}}
            @include('syokuposts.syokuposts')
        </div>
    </div>
@endsection