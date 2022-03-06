@extends('layouts.app')

@section('content')
    <div class="d-none d-sm-block">
        {{-- ナビゲーションバー --}}
        @include('users.navtabs')
    </div>
    <div class="row">
        <aside class="col-3">
            <div class="card">
                <div class="card-content">
                    {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                    <img class="rounded-circle img-field d-none d-md-block" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                    <img class="rounded-circle img-field d-block d-md-none icon-field" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
                    <h3 class="card-title text-center d-none d-md-block">{{ $user->user_name }}</h3>
                    <ul class="p-0 text-center">
                        <!--フォローアイコン-->
                        @if (Auth::id() != $user->id)
                            <li class="d-none d-md-block">
                                {{-- フォロー／アンフォローボタン --}}
                                @include('user_follow.follow_button') 
                            </li>
                            <li class="d-block d-md-none">
                                <i class="fas fa-user-plus fa-2x"></i>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </aside>
        <div class="col-9">
            {{-- 投稿一覧 --}}
            @include('syokuposts.syokuposts')
        </div>
    </div>
@endsection