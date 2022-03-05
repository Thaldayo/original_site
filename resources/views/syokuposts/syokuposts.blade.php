@if (count($originalposts) > 0)
    <ul class="list-unstyled">
        @foreach ($originalposts as $originalpost)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded-circle" src="{{ Gravatar::get($originalpost->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $originalpost->user->user_name, ['user' => $originalpost->user->id]) !!}
                        <span class="text-muted">posted at {{ $originalpost->created_at }}</span>
                    </div>
                    <div>
                        {{-- 写真 --}}
                        <p class="mb-0">{!! nl2br(e($originalpost->picture)) !!}</p>
                    </div>
                    <div>
                        {{-- メニュー名 --}}
                        <p class="mb-0">{!! nl2br(e($originalpost->menu)) !!}</p>
                    </div>
                    <div>
                        {{-- 店名 --}}
                        <p class="mb-0">{!! nl2br(e($originalpost->shop)) !!}</p>
                    </div>
                    <div>
                        {{-- 住所 --}}
                        <p class="mb-0">{!! nl2br(e($originalpost->shop_adress)) !!}</p>
                    </div>
                    <div>
                        {{-- コメンt --}}
                        <p class="mb-0">{!! nl2br(e($originalpost->comment)) !!}</p>
                    </div>

                    <div class="d-flex flex-row-reverse">
                        {{-- like, Unlikeボタン --}}
                        @include('button.like_btn')
                        @if(Auth::id() == $originalpost->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['originalposts.destroy', $originalpost->id], 'method' => 'delete']) !!}
                                {!! Form::button('<i class="fas fa-trash-alt"></i>', ['class' => 'btn', 'type' => 'submit']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $originalposts->links() }}
@endif