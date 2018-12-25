<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(20);

        return view('users.index', [
            'users' => $users,
        ]);
    }

    public function show($id)
    {
        $user = User::find($id);
        $topics = $user->topics()->orderBy('created_at', 'desc');

        $data = [
            'user' => $user,
            'topics' => $topics,
        ];

        $data += $this->counts($user);

        return view('users.show', $data);
    }
}