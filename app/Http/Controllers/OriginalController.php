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
            //$originals = $user->feed_originals()->orderBy('created_at', 'desc')->paginate(10);
            $originals = 'test';
            
            $data = [
                'user' => $user,
                'originals' => $originals,
            ];
        }
    
        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    
}
