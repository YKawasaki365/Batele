<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;  //追加

class TopicsController extends Controller
{
    public function index()
    {
        if (\Auth::check()) {
            $topics = Topic::orderBy('id', 'desc')->paginate(5);

            return view('users.show', [
                'topics' => $topics,
            ]);
        } 
        else {
            return view('welcome');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:61',
        ]);

        $request->user()->topics()->create([
            'title' => $request->title,
        ]);

        return back();
    }

}