@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div>
            {{-- ナビゲーションバー --}}
            @include('users.navtabs')
       </div>
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', null, []) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', null, []) !!}
            </div>
            <div class="form-group">
                {!! Form::label('barth', 'Barth') !!}
                {!! Form::date('barth', null, []) !!}
            </div>
            <div class="form-group">
                {!! Form::label('web', 'Web') !!}
                {!! Form::text('web', null, []) !!}
            </div>
            <div class="form-group">
                {!! Form::label('selfproduce', 'Selfproduce') !!}
                {!! Form::text('selfproduce', null, []) !!}
            </div>
            {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    @endif
@endsection