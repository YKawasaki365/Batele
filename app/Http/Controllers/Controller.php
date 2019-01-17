<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function counts($user) {
        $count_topics = $user->topics()->count();
        $count_favorites = $user->favorites()->count();
        $count_a_votes = $user->a_votes()->count();
        $count_b_votes = $user->b_votes()->count();

        return [
            'count_topics' => $count_topics,
            'count_favorites' => $count_favorites,
            'count_a_votes' => $count_a_votes,
            'count_b_votes' => $count_b_votes,
        ];
    }
}