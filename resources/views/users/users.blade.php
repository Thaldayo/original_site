@if (count($users) > 0)
    <ul class="list-unstyled">
        @foreach ($users as $user)
            <li class="media pt-3 pl-3 pr-3 border">
                {{-- ユーザのメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded-circle" src="{{ Gravatar::get($user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div class="d-flex justify-content-between">
                        <h4>{{ $user->user_name }}</h4>
                        {{-- フォロー／アンフォローボタン --}}
                        @include('user_follow.follow_button') 
                    </div>
                    <div class="text-left">
                        <p class="mb-1">{{ $user->selfproduce }}</p>
                    </div>
                    <div>
                        {{-- ユーザ詳細ページへのリンク --}}
                        <p class="mb-2">{!! link_to_route('users.show', 'View profile', ['user' => $user->id]) !!}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif