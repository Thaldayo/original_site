@extends('layouts')

@section('contetnt')
    <div>
        {{-- ナビゲーションバー 
        @include('users.navtabs')--}}
    </div>
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 
            @include('users.card')--}}
        </aside>
        <div class="col-sm-8">
            jlkad
        </div>
    </div>
@endsection