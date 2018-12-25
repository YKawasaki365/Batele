<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, $id)
    {
        \Auth::user()->comment($id);
        return back();
    }
    //  設計仕様上、コメント取り消しは無し
//    public function destroy($id)
//    {
//        \Auth::user()->uncomment($id);
//        return back();
//    }

// コメント一覧?
    public function comments($id)
    {
        $user = User::find($id);
        $comments = $user->comments()->orderBy('created_at', 'desc')->paginate(10);

        $data = [
            'user' => $user,
            'topics' => $comments,
        ];

        $data += $this->counts($user);

        return view('users.comments', $data);
    }

}