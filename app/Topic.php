<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'user', 'topic_id', 'user_id', 'a0_item', 'a1_item', 'a2_item', 'a3_item', 'a4_item', 'b0_item', 'b1_item', 'b2_item', 'b3_item', 'b4_item',]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

// 以下、お気に入りに関して
    public function favorite_users()
    {
        return $this->belongsToMany(Topic::class, 'favorites', 'topic_id', 'user_id')->withTimestamps();
    }

// 以下、A投票に関して
    public function a_vote_users()   //  あるトピックが投票された総数
    {
        return $this->belongsToMany(Topic::class, 'a_votes', 'topic_id', 'user_id')->withTimestamps();
    }

// 以下、B投票に関して
    public function b_vote_users()   //  あるトピックが投票された総数
    {
        return $this->belongsToMany(Topic::class, 'b_votes', 'topic_id', 'user_id')->withTimestamps();
    }
}