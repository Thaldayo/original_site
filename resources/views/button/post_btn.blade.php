@if(Auth::id() == $user->id)
    <div class="text-center">
        {{-- 投稿ページへ --}}
        {!! link_to_route('originalpost',  '投稿', [], ['class' => 'btn btn-outline-secondary w-75']) !!}
    </div>
@endif