@if (count($originalposts) > 0)
    <ul class="list-unstyled">
        @foreach ($originalposts as $originalpost)
            <li class="media p-3 border">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                @if($user->user_icon != NULL)
                    <img src="/uploads/{{ $user->user_icon}}" class="rounded-circle img-trimming-sm mr-2">
                @else
                    <img class="mr-2 rounded-circle" src="{{ Gravatar::get($originalpost->user->email, ['size' => 40]) }}" alt="">
                @endif
                <div class="media-body">
                    <div class="mb-2">
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $originalpost->user->user_name, ['user' => $originalpost->user->id]) !!}
                        <span class="text-muted">posted at {{ $originalpost->created_at }}</span>
                    </div>
                    <div>
                        {{-- メニュー名 --}}
                        <h4 class="mb-1">{!! nl2br(e($originalpost->menu)) !!}</h4>

                        {{-- 写真 --}}
                        <img src="/uploads/{{ $originalpost->picture }}" class="img-fluid picture-border">
                    </div>
                    <div class="mt-2">
                        {{-- 店名 --}}
                        <h4>{!! nl2br(e($originalpost->shop)) !!}</4>
                        
                        {{-- 住所 --}}
                        <p class="small mb-0 border-bottom">{!! nl2br(e($originalpost->shop_adress)) !!}</p>
                        
                        {{-- コメント --}}
                        <p class="mb-0 pt-1 small">{!! nl2br(e($originalpost->comment)) !!}</p>
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