<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Topic;  //追加

class TopicsController extends Controller
{
    public function index() //  トピック一覧
    {
            $topics = Topic::orderBy('id', 'desc')->paginate(5);

            return view('welcome', [
                'topics' => $topics,
            ]);
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        return view('topics.create');
    }

    public function store(Request $request) //  トピック投稿
    {
        $this->validate($request, [
            'title' => 'required|max:61',
            'a0_item' => 'required|max:181',
            'a1_item' => 'required|max:181',
            'a2_item' => 'required|max:181',
            'a3_item' => 'required|max:181',
            'a4_item' => 'required|max:181',
        ]);

        $request->user()->topics()->create([
            'title' => $request->title,
            'a0_item' => $request->a0_item,
            'a1_item' => $request->a1_item,
            'a2_item' => $request->a2_item,
            'a3_item' => $request->a3_item,
            'a4_item' => $request->a4_item,
            'b0_item' => '',
            'b1_item' => '',
            'b2_item' => '',
            'b3_item' => '',
            'b4_item' => '',

        ]);

        return redirect('/');
    }

    // getでmessages/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $topic = Topic::find($id);

        return view('topics.edit', [
            'topic' => $topic,
        ]);
    }

    // putまたはpatchでtopics/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'b0_item' => 'required|max:181',
            'b1_item' => 'required|max:181',
            'b2_item' => 'required|max:181',
            'b3_item' => 'required|max:181',
            'b4_item' => 'required|max:181',
        ]);

        $topic = Topic::find( $id );
        if( $topic !== null && $topic ->b0_item != '' ){
        abort(400, '禁止です');
        }

        $topic->b0_item = $request->b0_item;
        $topic->b1_item = $request->b1_item;
        $topic->b2_item = $request->b2_item;
        $topic->b3_item = $request->b3_item;
        $topic->b4_item = $request->b4_item;
        $topic->save();

        return redirect('/');
    }

}