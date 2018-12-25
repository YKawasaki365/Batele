<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function topics()
    {
        return $this->hasMany(Topic::class);
    }

// 以下、お気に入りに関して
    public function favorites() // お気に入り一覧を取得する機能
    {
        return $this->belongsToMany(Topic::class, 'favorites', 'user_id', 'topic_id')->withTimestamps();
    }

    public function favorite($topicId)
    {
        // 既にお気に入りしているかの確認
        if ($this->is_favoring($topicId)) {
            // 既にフォローしていれば何もしない
            return false;
        } else {
            // 未フォローであればフォローする
            $this->favorites()->attach($topicId);
            return true;
        }
    }

    public function unfavorite($topicId)
    {
        if ($exist = $this->is_favoring($topicId)) {
            // 既にフォローしていればフォローを外す
            $this->favorites()->detach($topicId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }

    public function is_favoring($topicId)
    {
        return $this->favorites()->where('topic_id', $topicId)->exists();
    }

// 以下、投票に関して

    public function votes() // 投票一覧を取得する機能(不要か?)
    {
        return $this->belongsToMany(Topic::class, 'votes', 'user_id', 'topic_id')->withTimestamps();
    }

    public function vote($topicId)
    {
        // 既に投票しているかの確認
        if ($this->is_voting($topicId)) {
            // 既に投票していれば何もしない
            return false;
        } else {
            // 未投票であれば投票する
            $this->votes()->attach($topicId);
            return true;
        }
    }

    public function unvote($topicId)
    {
        if ($exist = $this->is_voting($topicId)) {
            // 既にフォローしていればフォローを外す
            $this->votes()->detach($topicId);
            return true;
        } else {
            // 未フォローであれば何もしない
            return false;
        }
    }

    public function is_voting($topicId)
    {
        return $this->votes()->where('topic_id', $topicId)->exists();
    }

// 以下、反論書き込みに関して(function undoは仕様にない為、未実装)

    public function comments() // 反論書き込み一覧を取得する機能(不要か?)
    {
        return $this->belongsToMany(Topic::class, 'comments', 'user_id', 'topic_id')->withTimestamps();
    }

    public function comment($topicId)
    {
        // 既に投票しているかの確認
        if ($this->is_commenting($topicId)) {
            // 既に投票していれば何もしない
            return false;
        } else {
            // 未投票であれば投票する
            $this->comments()->attach($topicId);
            return true;
        }
    }

    public function is_commenting($topicId)
    {
        return $this->comments()->where('topic_id', $topicId)->exists();
    }


}
