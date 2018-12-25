<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VotesController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->vote($id);
        return back();
    }

    public function destroy($id)
    {
        \Auth::user()->unvote($id);
        return back();
    }

// 投票一覧 [[は設計仕様にないのでpub fuc votes($id)は省略]]
    public function votes($id)
    {
        $user = User::find($id);
        $votes = $user->votes()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'topics' => $votes,
        ];

        $data += $this->counts($user);

        return view('users.votes', $data);
    }

}