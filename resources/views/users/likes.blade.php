@extends('layouts.app')

@section('content')
    <div>
        {{-- ナビゲーションバー --}}
        @include('users.navtabs')
    </div>
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
            
            {{-- 投稿ボタン --}}
            @include('button.post_btn')
        </aside>
        <div class="col-sm-8">
            {{-- 投稿一覧 --}}
            @include('syokuposts.syokuposts')
        </div>
    </div>
@endsection