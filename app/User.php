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
        'user','name', 'email', 'password',
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

// 以下、A投票に関して(Undo functionは仕様外の為、未実装)

    public function a_votes()   //  あるユーザーが投票したtopicの総数
    {
        return $this->belongsToMany(Topic::class, 'a_votes', 'user_id', 'topic_id')->withTimestamps();
    }

    public function a_vote($topicId)
    {
        // 既に投票しているかの確認
        if ($this->a_is_voting($topicId)) {
            // 既に投票していれば何もしない
            return false;
        } else {
            // 未投票であれば投票する
            $this->a_votes()->attach($topicId);
            return true;
        }
    }

    public function a_is_voting($topicId)
    {
        return $this->a_votes()->where('topic_id', $topicId)->exists();
    }

// 以下、B投票に関して(Undo functionは仕様外の為、未実装)

    public function b_votes()   //  あるユーザーが投票したtopicの総数
    {
        return $this->belongsToMany(Topic::class, 'b_votes', 'user_id', 'topic_id')->withTimestamps();
    }

    public function b_vote($topicId)
    {
        // 既に投票しているかの確認
        if ($this->b_is_voting($topicId)) {
            // 既に投票していれば何もしない
            return false;
        } else {
            // 未投票であれば投票する
            $this->b_votes()->attach($topicId);
            return true;
        }
    }

    public function b_is_voting($topicId)
    {
        return $this->b_votes()->where('topic_id', $topicId)->exists();
    }

// 以下、反論書き込みに関して(Undo functionは仕様外の為、未実装)

    public function comments() // 反論書き込み一覧を取得する機能
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
