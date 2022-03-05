@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="d-none d-sm-block">
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
            <div class="col-9 p-0">
                {{-- 投稿一覧 --}}
                @include('syokuposts.syokuposts')
            </div>
        </div>
    @else
        <div>
            {{-- ログインフォーム --}}
            @include('auth.login')
        </div>
    @endif
@endsection