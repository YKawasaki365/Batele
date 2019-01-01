<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = ['title', 'topic_id', 'user_id', 'a0_item', 'a1_item', 'a2_item', 'a3_item', 'a4_item', 'b0_item', 'b1_item', 'b2_item', 'b3_item', 'b4_item',]; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

// 以下、お気に入りに関して
    public function favorite_users()
    {
        return $this->belongsToMany(Topic::class, 'favorites', 'topic_id', 'user_id')->withTimestamps();
    }

// 以下、投票に関して
    public function vote_users()
    {
        return $this->belongsToMany(Topic::class, 'votes', 'topic_id', 'user_id')->withTimestamps();
    }

}