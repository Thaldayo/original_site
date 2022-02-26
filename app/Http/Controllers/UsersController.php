<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
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
     * ユーザー一を覧表示するアクション。
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
        
 ;       //ユーザの投稿一覧を作成日時の降順で取得

        $originalposts = $user->originalposts()->orderBy('created_at', 'desc')->paginate(10);
 
        // ユーザ詳細ビューでそれを表示
        return view('users.show', [
            'user' => $user,
            'originalposts' => $originalposts,
        ]);
    }
    
    /**
     * ユーザのプロフィールを編集するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
     public function edit(){
         
     }
    
    /**
     * ユーザのフォロー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function follows($id){
        
    }
    
    /**
     * ユーザのフォロワー一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function followers($id){
        
    }
    
    /**
     * ユーザのライク一覧ページを表示するアクション。
     *
     * @param  $id  ユーザのid
     * @return \Illuminate\Http\Response
     */
    public function likes($id){
        
    }
}
