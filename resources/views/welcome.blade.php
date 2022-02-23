@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">

                
                {{-- 投稿一覧 --}}
                <p>テスト</p>
            </div>
        </div>
    @else
        <div>
            {{-- ログインフォーム --}}
            @include('auth.login')
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}    
        </div>
    @endif
@endsection