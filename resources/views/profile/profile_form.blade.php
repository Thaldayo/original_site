@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div>
            {{-- ナビゲーションバー --}}
            @include('users.navtabs')
       </div>
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put']) !!}

            <div class="form-group black-text-box">
                <span class="box-title">ユーザーネーム</span>
                {!! Form::text('name', null, ['class' => 'no-box w-100']) !!}
            </div>
            <div class="form-group black-text-box">
                <span class="box-title">メールアドレス</span>
                {!! Form::email('email', null, ['class' => 'no-box w-100']) !!}
            </div>
            <div class="form-group black-text-box">
                <span class="box-title">生年月日</span>
                {!! Form::date('barth', null, ['class' => 'no-box w-20']) !!}
            </div>
            <div class="form-group black-text-box">
                <span class="box-title">自己紹介</span>
                {!! Form::text('selfproduce', null, ['class' => 'no-box w-100']) !!}
            </div>
            {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    @endif
@endsection