@if (Auth::user()->doing_like($originalpost->id))
    {{-- unlikeボタンのフォーム --}}
    {!! Form::open(['route' => ['likes.unlike', $originalpost->id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fas fa-star fa-lg" style="color: deeppink;"></i>', ['class' => "btn", 'type' => 'submit']) !!}
    {!! Form::close() !!}
@else
    {{-- likeボタンのフォーム --}}
    {!! Form::open(['route' => ['likes.like', $originalpost->id]]) !!}
        {!! Form::button('<i class="far fa-star fa-lg" style="color: black;"></i>', ['class' => "btn", 'type' => 'submit']) !!}
    {!! Form::close() !!}
@endif