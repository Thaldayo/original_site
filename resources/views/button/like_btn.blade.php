@if (Auth::user()->doing_like($originalpost->id))
    {{-- unlikeボタンのフォーム --}}
    {!! Form::open(['route' => ['likes.unlike', $originalpost->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unlike', ['class' => "btn btn-danger btn-block"]) !!}
    {!! Form::close() !!}
@else
    {{-- likeボタンのフォーム --}}
    {!! Form::open(['route' => ['likes.like', $originalpost->id]]) !!}
        {!! Form::submit('like', ['class' => "btn btn-primary btn-block"]) !!}
    {!! Form::close() !!}
@endif