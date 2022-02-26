@extends('layouts.app')

@section('content')
    @if(Auth::check())
        <div>
            {{-- ナビゲーションバー 
            @include('users.navtabs')--}}
       </div>
        <div class="text-center">
            <h1>Post</h1>
        </div>
    
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                {{-- 投稿画面表示 --}}
                @include('syokuposts.postform')
            </div>
        </div>
    @endif
@endsection