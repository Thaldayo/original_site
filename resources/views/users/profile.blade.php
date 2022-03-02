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
        </aside>
        <div class="col-sm-8">
            {{-- プロフィール画面表示 --}}
            @include('profile.profile_layout')
        </div>
    </div>
@endsection