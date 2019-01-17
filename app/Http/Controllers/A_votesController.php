<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Topic; // 追加

class A_votesController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->a_vote($id);
        return back();
    }

// A投票に関して
    public function a_votes($id)
    {
        $user = User::find($id);
        $votes = $user->a_votes()->orderBy('created_at', 'desc')->paginate(10);
//        $count_votes = $topic->a_vote_users()->count();

        $data = [
            'user' => $user,
            'topics' => $votes,
//            'count_votes' => $count_votes,
        ];

        $data += $this->counts($user);

//        return back();

//      return view('users.a_votes', $data);
//        return view('topics.topics', $data);
        return view('topics.topics', $data);

// dd($data);
//        return view('user_buttons.vote_count', $data); //成功

//        return view('users.votes', $data); //成功
    }

}