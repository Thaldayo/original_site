<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'shop', 'shop_adress', 'picture', 'menu', 'comment'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    /**
     * このユーザが所有する投稿。（ Originalpostモデルとの関係を定義）
    */
    public function originalposts()
    {
        return $this->hasMany(Originalpost::class);
    }
    
    public function loadRelationshipCounts()
    {
        $this->loadCount(['originalposts', 'followings', 'followers', 'likes']);
    }
    
     /**
     * このユーザがフォロー中のユーザ。（ Userモデルとの関係を定義）
     */
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    /**
     * このユーザをフォロー中のユーザ。（ Userモデルとの関係を定義）
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    /**
     * $userIdで指定されたユーザをフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
    public function follow($userId)
    {
        // すでにフォローしているか
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうか
        $its_me = $this->id == $userId;

        if ($exist || $its_me) {
            // フォロー済み、または、自分自身の場合は何もしない
            return false;
        } else {
            // 上記以外はフォローする
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    /**
     * $userIdで指定されたユーザをアンフォローする。
     *
     * @param  int  $userId
     * @return bool
     */
    public function unfollow($userId)
    {
        // すでにフォローしているか
        $exist = $this->is_following($userId);
        // 対象が自分自身かどうか
        $its_me = $this->id == $userId;

        if ($exist && !$its_me) {
            // フォロー済み、かつ、自分自身でない場合はフォローを外す
            $this->followings()->detach($userId);
            return true;
        } else {
            // 上記以外の場合は何もしない
            return false;
        }
    }
    
    /**
     * 指定された $userIdのユーザをこのユーザがフォロー中であるか調べる。フォロー中ならtrueを返す。
     *
     * @param  int  $userId
     * @return bool
     */
    public function is_following($userId)
    {
        // フォロー中ユーザの中に $userIdのものが存在するか
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    /**
     * このユーザとフォロー中ユーザの投稿に絞り込む。
     */
    public function feed_originalposts()
    {
        // このユーザがフォロー中のユーザのidを取得して配列にする
        $userIds = $this->followings()->pluck('users.id')->toArray();
        // このユーザのidもその配列に追加
        $userIds[] = $this->id;
        // それらのユーザが所有する投稿に絞り込む
        return Originalpost::whereIn('user_id', $userIds);
    }
    
    /**
     * このユーザがライクしている投稿（ Userモデルとの関係を定義）
     */
    public function likes()
    {
        return $this->belongsToMany(Originalpost::class, 'user_like', 'user_id', 'post_id')->withTimestamps();
    }
    
    /**
     * $micropostIdで指定されたユーザの投稿をライクする。
     *
     * @param  int  $micropostId
     * @return bool
     */
    public function like($originalpostId)
    {
        //すでにライクしているか
        $exist = $this->doing_like($originalpostId);
        
        if($exist){
            //ライク済みまたは自身の投稿の場合は何もしない
            return false;
        }
        else{
            //上記以外はお気に入り
            $this->likes()->attach($originalpostId);
            return true;
        }
    }
    
    /**
     * $userIdで指定されたユーザの投稿のお気に入りを解除する。
     *
     * @param  int  $micropostId
     * @return bool
     */
    public function unlike($originalpostId)
    {
        // すでにお気に入りしているか
        $exist = $this->is_to_favorite($originalpostId);

        if ($exist) {
            // お気に入り済み、かつ、自分自身のでない場合はフォローを外す
            $this->favorites()->detach($originalpostId);
            return true;
        } else {
            // 上記以外の場合は何もしない
            return false;
        }
    }
    
    /**
     * 指定された 指定された投稿がお気に入り中であるか調べる。お気に入り中ならtrueを返す。
     *
     * @param  int  $micropostId
     * @return bool
     */
     public function doing_like($originalpostId)
     {
         // お気に入り中の投稿の中に$micropostIdのものが存在するか
        return $this->likes()->where('post_id', $originalpostId)->exists();
     }
}
