<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Income;
use App\Models\Comment;
use App\Http\Requests\RecordStoreRequest;
use App\Http\Requests\RecordPostCommentRequest;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     * タイムライン表示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');
        return view('records.index')->with(['posts' => $posts]);
    }

    /**
     * Display the specified resource.
     * 記録詳細画面表示処理
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // idから記録を取得
        $post = Post::find($id);

        // idから記録につけられたコメントを取得
        $comments = Comment::where('post_id', $id)->get();

        return view('records.show')->with([
                'post' => $post,
                'comments' => $comments,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('records.create');
    }

    /**
     * Store a newly created resource in storage.
     * 記録作成処理
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function store(RecordStoreRequest $request, Income $income, Post $post)
    {
        // commentへの入力がなかった時に使うテンプレートのメッセージの分岐処理
        // commentの入力があった場合には$outgo_assessmentは使用されない
        switch($request->outgo) {
            case $request->outgo <= 10000:
                $outgo_assessment = 'かなり押さえることができました。';
            break;
            case $request->outgo <= 30000:
                $outgo_assessment = '少し押さえることができました。';
            break;
            case $request->outgo <= 50000:
                $outgo_assessment = 'ぼちぼちでした。';
            break;
            case $request->outgo <= 100000:
                $outgo_assessment = '平均的でした。';
            break;
            case $request->outgo <= 200000:
                $outgo_assessment = '使いすぎました。';
            break;
            case $request->outgo <= 1000000:
                $outgo_assessment = '冷や汗が出るほどでした。';
            break;
            case $request->outgo > 1000000:
                $outgo_assessment = '教えられそうにありません。';
            break;
            default:
                $outgo_assessment = '秘密です。';
        }

        // titleとcommentの入力がなかった場合のデフォルトテンプレート
        $default_title   = '今月もがんばりました。';
        $default_comment = '今月の収入は' . $request->income . '円で、クレジットカードの使用額は' . $outgo_assessment;

        // incomeインスタンスへのinsert処理
        $income->fill([
            'user_id'   => $request->user_id,
            'year'      => $request->year,
            'month'     => $request->month,
            'income'    => $request->income,
            'outgo_cre' => $request->outgo,
        ]);

        // postインスタンスへのinsert処理
        // titleとbodyはnullableにしてあるが、入力がなかった時はデフォルト値を設定している
        $post->fill([
            'user_id' => $request->user()->id,
            'title'   => $request->title ?? $default_title,
            'body'    => $request->comment ?? $default_comment,
            'year'    => $request->year,
            'month'   => $request->month,
            'check'   => (bool)$request->done,
        ]);

        $income->save();
        $post->save();

        return redirect()->route('profile.show_profile', ['id' => $request->user_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postComment(RecordPostCommentRequest $request, Comment $comment)
    {
        $comment->fill([
            'user_id' => $request->user()->id,
            'post_id' => $request->post_id,
            'comment' => $request->comment,
        ])->save();

        return redirect()->route('records.show', $request->post_id);
    }

}
