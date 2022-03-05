<div class="text-center">
    <!--ユーザーアイコン表示-->
    <div>
        <!--<img src="{{ $user->picture }}" alt="">-->
    </div>
    
    <!--ユーザーネーム表示-->
    <div class="blue-text-box">
        <span class="box-title">ユーザーネーム</span>
        <p>{{ $user->user_name }}</p>
    </div>
    
    <!--メールアドレス表示-->
    <div class="blue-text-box">
        <span class="box-title">メールアドレス</span>
        <p>{{ $user->email }}</p>
    </div>
    
    <!--生年月日表示-->
    <div class="blue-text-box">
        <span class="box-title">生年月日</span>
        <p>{{ $user->birthday }}</p>
    </div>
    
    <!--自己紹介表示-->
    <div class="blue-text-box text-left">
        <span class="box-title">自己紹介</span>
        <p>{{ $user->selfproduce }}</p>
    </div>
    
    <!--編集ボタン-->
    {{-- 投稿ボタン --}}
    @include('button.edit_btn')
</div>