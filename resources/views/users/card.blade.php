<div class="card">
    <div class="card-content">
        
        @if($user->user_icon != NULL)
            <img src="/uploads/{{ $user->user_icon}}" class="rounded-circle img-trimming img-trimming-field d-none d-md-block">
            <img src="/uploads/{{ $user->user_icon}}" class="rounded-circle img-trimming-sm img-trimming-field d-block d-md-none">
        @else
            {{-- $user_iconがNullならユーザのメールアドレスをもとにGravatarを取得して表示 --}}
            <img class="rounded-circle img-field d-none d-md-block" src="{{ Gravatar::get($user->email, ['size' => 400]) }}" alt="">
            <img class="rounded-circle img-field d-block d-md-none p-0 text-center" src="{{ Gravatar::get($user->email, ['size' => 400]) }}" alt="">
        @endif
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
            
            <!--ホームアイコン-->
            <li class="d-block d-md-none icon-field">
                <a href="/" >
                    <i class="fas fa-home fa-2x"></i></i>
                </a>
            </li>
            <!--プロフィールアイコン-->
            <li class="d-block d-md-none">
                <a href="{{ route('users.profile', ['id' => $user->id]) }}" >
                    <i class="fas fa-user fa-2x"></i>
                </a>
            </li>
            @if(Auth::id() == $user->id)
                <!--投稿アイコン-->
                <li class="d-block d-md-none">
                    <a href="{{ route('originalpost', []) }}" >
                        <i class="fas fa-pen-square fa-2x"></i>
                    </a>
                </li>
            @endif
            <!--ログアウト-->
            <li class="d-block d-md-none">
                <a href="{{ route('logout.get', []) }}" >
                    <i class="fas fa-sign-out-alt fa-2x"></i>
                </a>
            </li>

            <li class="d-none d-md-block m-2"><a href="/" >ホーム</a></li>
            <li class="d-none d-md-block m-2"><a href="{{ route('users.profile', ['id' => $user->id]) }}" >プロフィール</a></li>
            {{-- 投稿ボタン --}}
            <li class="d-none d-md-block m-2">{!! link_to_route('logout.get', 'Logout') !!}</li>
        </ul>
    </div>
</div>