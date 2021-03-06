@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div>
            {{-- ナビゲーションバー --}}
            @include('users.navtabs')
       </div>
        {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'enctype'=>'multipart/form-data']) !!}
            <div>
                <span>ユーザーアイコン</span>
                {!! Form::file('user_icon', null, []) !!}
            </div>
            <div class="form-group black-text-box">
                <span class="box-title">ユーザーネーム</span>
                {!! Form::text('user_name', null, ['class' => 'no-box w-100']) !!}
            </div>
            <div class="form-group black-text-box">
                <span class="box-title">メールアドレス</span>
                {!! Form::email('email', null, ['class' => 'no-box w-100']) !!}
            </div>
            <div class="form-group black-text-box">
                <span class="box-title">生年月日</span>
                {!! Form::date('birthday', null, ['class' => 'no-box w-20']) !!}
            </div>
            <div class="form-group black-text-box">
                <span class="box-title">自己紹介</span>
                {!! Form::text('selfproduce', null, ['class' => 'no-box w-100']) !!}
            </div>
            {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
        {!! Form::close() !!}
    @endif
@endsection