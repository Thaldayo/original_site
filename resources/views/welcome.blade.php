@extends('layouts.app')

@section('content')
    <div>
        {{-- ログインフォーム --}}
        @include('auth.login')
        
        {{-- ユーザ登録ページへのリンク --}}
        {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}    </div>
@endsection