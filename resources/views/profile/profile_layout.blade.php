<div class="text-center">
    <!--ユーザーアイコン表示-->
    <div>
        <!--<img src="{{ $user->picture }}" alt="">-->
    </div>
    
    <!--ユーザーネーム表示-->
    <div>
        <label>ユーザーネーム</label>
        <p>{{ $user->name }}</p>
    </div>
    
    <!--メールアドレス表示-->
    <div>
        <label>メールアドレス</label>
        <p>{{ $user->email }}</p>
    </div>
    
    <!--生年月日表示-->
    <div>
        <label>生年月日</label>
        <p>{{ $user->barth }}</p>
    </div>
    
    <!--Web表示-->
    <div>
        <label>Web</label>
        <p>{{ $user->web }}</p>
    </div>
    
    <!--自己紹介表示-->
    <div>
        <label>自己紹介表示</label>
        <p>{{ $user->selfproduce }}</p>
    </div>
    
    <!--編集ボタン-->
    {{-- 投稿ボタン --}}
    @include('button.edit_btn')
</div>