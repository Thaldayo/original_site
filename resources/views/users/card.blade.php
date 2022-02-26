<div class="card">
    
    <div class="card-body">
        {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
        <img class="rounded img-fluid" src="{{ Gravatar::get($user->email, ['size' => 500]) }}" alt="">
        <h3 class="card-title text-center">{{ $user->name }}</h3>
        <ul>
            <li>投稿一覧</li>
            <li>プロフィール</li>
            <li>{!! link_to_route('logout.get', 'Logout') !!}</li>
        </ul>
    </div>
</div>
{{-- フォロー／アンフォローボタン --}}
@include('user_follow.follow_button') 