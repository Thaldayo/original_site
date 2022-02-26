@extends('layouts.app')

@section('content')
    <div>
        {{-- ナビゲーションバー --}}
        @include('users.navtabs')
    </div>
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                </div>
            </div>
            {{-- フォロー／アンフォローボタン --}}
            @include('user_follow.follow_button')
        </aside>
        <div class="col-sm-8">
            {{-- 投稿一覧 --}}
            @include('syokuposts.syokuposts')
        </div>
    </div>
@endsection