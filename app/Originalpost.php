<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Originalpost extends Model
{
    protected $fillable = [
        'shop',
        'shop_adress',
        'picture',
        'menu',
        'comment'
    ];
    
    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * この投稿をライクしているユーザ（ Userモデルとの関係を定義）
     */
    public function likes()
    {
        return $this->belongsToMany(User::class, 'user_like', 'post_id', 'user_id')->withTimestamps();
    }
}
