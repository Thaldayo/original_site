@extends('layouts.app')

@section('content')
    {{-- タブ --}}
    @include('users.navtabs')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{-- ユーザ一覧 --}}
            @include('users.users')
        </div>
    </div>
@endsection