<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    
    /**
     * ユーザー一覧を表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ユーザ一覧をidの降順で取得
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        // ユーザ一覧ビューでそれを表示
        return view('users.index', [
            'users' => $users,
        ]);
    }
        
    /**
     * ホームを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);
    
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        ;
        //ユーザの投稿一覧を作成日時の降順で取得
        $originalposts = $user->originalposts()->orderBy('created_at', 'desc')->paginate(10);
 
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'originalposts' => $originalposts,
        ]);
    }
    
    /**
     * ユーザのプロフィールを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function showProfile($id)
    {
        //idの値でユーザーを検索して取得
        $user = User::findOrFail($id);
        
        //ユーザーのプロフィールデータを表示
        $data = User::find($id);
        
        return view('users.profile', [
            'user' => $user,
            'data' => $data,
        ]);
    }
    
    /**
     * ユーザのプロフィールを編集画面を表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
     public function edit()
     {
        //idの値でユーザーを検索して取得
        $user = \Auth::user();
 
        // 投稿画面を表示
        return view('profile.profile_form', [
            'user' => $user,
        ]);
     }
     
     /**
     * ユーザのプロフィールを編集するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
         //バリデーション
        $request->validate([
            'user_icon' => 'image|file',
            'user_name' => 'required|max:30',
            'email' => 'required|max:255',
            'birthday' => 'required|date',
            'selfproduce' => 'required|max:255',
        ]);
        
        //Laravel直下のpublicディレクトリに保存
        if($user_icon = $request->user_icon){
            //保存する画像に命名
            $user_iconName = time().'.'.$user_icon->getClientOriginalExtension();
            ////Laravel直下のpublicディレクトリに新フォルダを作り保存する
            $target_path = public_path('/uploads/');
            $user_icon->move($target_path,$user_iconName);
        }
        else{
            //画像が登録されなかった時は空文字を入れる
            $nameNull="";
        }
        
        // idの値でプロフィールを検索して取得
        $profile = User::findOrFail($id);
        
        // プロフィールを更新
        $profile->user_icon = $user_iconName;
        $profile->user_name = $request->user_name;
        $profile->email = $request->email;
        $profile->birthday = $request->birthday;
        $profile->selfproduce = $request->selfproduce;
        $profile->save();

        // トップページへリダイレクトさせる
        return redirect('/');
     }
    
    /**
     * ユーザのフォロー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followings($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロー一覧を取得
        $followings = $user->followings()->paginate(10);

        // フォロー一覧ビューでそれらを表示
        return view('users.followings', [
            'user' => $user,
            'users' => $followings,
        ]);
    }

    /**
     * ユーザのフォロワー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followers($id)
    {
        // idの値でユーザを検索して取得
        $user = User::findOrFail($id);

        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();

        // ユーザのフォロワー一覧を取得
        $followers = $user->followers()->paginate(10);

        // フォロワー一覧ビューでそれらを表示
        return view('users.followers', [
            'user' => $user,
            'users' => $followers,
        ]);
    }
    
    /**
     * ユーザのライク一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function likes($id)
    {
        //idの値でユーザを検索して取得
        $user = User::findOrFail($id);
        
        //関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザがお気に入りしている投稿一覧を取得
        $likes = $user->likes()->orderBy('created_at', 'desc')->paginate(10);

        // お気に入りしている投稿一覧をビューでそれらを表示
        return view('users.likes', [
            'user' => $user,
            'originalposts' => $likes,
        ]);
    }
}
