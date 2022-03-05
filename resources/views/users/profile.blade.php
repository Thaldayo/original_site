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
            {{-- プロフィール画面表示 --}}
            @include('profile.profile_layout')
        </div>
    </div>
@endsection