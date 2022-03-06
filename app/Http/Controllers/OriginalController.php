<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OriginalController extends Controller
{
    public function index(){
        $data = [];
        if(\Auth::check()) {
            //認証済みユーザ（閲覧者）を取得
            $user = \Auth::user();
            //var_dump($user);dd();
            //ユーザとフォロー中ユーザの投稿の一覧を作成日時の降順で取得
            $originalposts = $user->feed_originalposts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'originalposts' => $originalposts,
            ];
        }
    
        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    //投稿画面表示処理
    public function showPostForm()
    {
        //認証済みユーザ（閲覧者）を取得
        $user = \Auth::user();
        // 投稿画面を表示
        return view('users.posts', [
            'user' => $user
        ]);
    }
    
    public function store(Request $request)
    {
        //バリデーション
        $request->validate([
            'shop' => 'required|max:50',
            'shop_adress' => 'required|max:255',
            'picture' => 'image|file',
            'menu' => 'required|max:50',
            'comment' => 'required|max:255',
        ]);
        
        //Laravel直下のpublicディレクトリに保存
        if($picture = $request->picture){
            //保存する画像に命名
            $pictureName = time().'.'.$picture->getClientOriginalExtension();
            //Laravel直下のpublicディレクトリに新フォルダを作り保存する
            $target_path = public_path('/uploads/');
            $picture->move($target_path,$pictureName);
        }
        else{
            //画像が登録されなかった時は空文字を入れる
            $nameNull="";
        }
        
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->originalposts()->create([
            'shop' => $request->shop,
            'shop_adress' => $request->shop_adress,
            'nameNull' => $request->input('nameNull'),
            'picture' => $pictureName,
            'menu' => $request->menu,
            'comment' => $request->comment,
        ]);
        
        //前のURLへリダイレクト
        return back();
    }
    
    public function destroy($originalpost)
    {
        //idの値で投稿を検索して取得
        $originalpost = \App\Originalpost::findOrFail($originalpost);
        
        //認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if(\Auth::id() === $originalpost->user_id) {
            $originalpost->delete();
        }
        
        //前のURLへリダイレクト
        return back();
    }
}
