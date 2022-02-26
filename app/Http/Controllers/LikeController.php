<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * 投稿をライクするアクション。
     *
     * @param  $id  投稿のid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        //認証済みユーザ（閲覧者）が、 idの投稿をお気に入りする
        \Auth::user()->like($id);
        //前のURLへリダイレクトさせる
        return back();
    }
    
    /**
     * 投稿のライクを解除するアクション。
     *
     * @param  $id  投稿のid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 お気に入りを解除する
        \Auth::user()->unfavorite($id);
        //前のURLへリダイレクトさせる
        return back();
    }
}
