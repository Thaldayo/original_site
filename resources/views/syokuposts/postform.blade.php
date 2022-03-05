@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div>
            {{-- ナビゲーションバー --}}
            @include('users.navtabs')
       </div>
       
        {!! Form::open(['route' => 'originalposts.store', 'enctype'=>'multipart/form-data']) !!}
            <div class="form-group">
                {!! Form::label('shop', 'Shop') !!}
                {!! Form::text('shop', null, ['class' => 'form-control']) !!}
            </div>
            
            <div class="form-group">
                {!! Form::label('shop_adress', 'Shop adress') !!}
                {!! Form::text('shop_adress', null, ['class' => 'form-control']) !!}
            </div>
    
            <div class="form-group" >
                {!! Form::label('picture', 'Picture') !!}
                {!! Form::file('picture', null, []) !!}
            </div>

            <div class="form-group">
                {!! Form::label('menu', 'Menu') !!}
                {!! Form::text('menu', null, ['class' => 'form-control']) !!}
            </div>
        
            
            <div class="form-group">
                {!! Form::label('comment', 'Comment') !!}
                {!! Form::text('comment', null, ['class' => 'form-control']) !!}
            </div>
    
            {!! Form::submit('Post', ['class' => 'btn btn-primary btn-block']) !!}
        {!! Form::close() !!}
    @endif
@endsection