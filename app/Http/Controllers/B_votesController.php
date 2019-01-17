<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User; // 追加
use App\Topic;  //追加

class B_votesController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->b_vote($id);
        return back();
    }

// B投票に関して
    public function b_votes($id)
    {
        $user = User::find($id);
        $votes = $user->b_votes()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'topics' => $votes,
        ];

        $data += $this->counts($user);

        return view('users.b_votes', $data);
    }

}