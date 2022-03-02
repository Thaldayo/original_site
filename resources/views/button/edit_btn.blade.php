@if(Auth::id() == $user->id)
    <div>
        {{-- 編集ページへ --}}
        {!! link_to_route('users.edit', 'Edit', ['user' => $user->id], ['class' => 'btn btn-primary']) !!}
    </div>
@endif