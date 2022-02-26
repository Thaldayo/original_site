@if(Auth::id() == $user->id)
    <div>
        {{-- 投稿ページへ --}}
        {!! link_to_route('post',  'Post', [], ['class' => 'btn btn-primary']) !!}
    </div>
@endif