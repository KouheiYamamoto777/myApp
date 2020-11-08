<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Income;
use App\Http\Requests\RecordRequest;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('records.index');
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecordRequest $request, Income $income, Post $post)
    {
        // commentへの入力がなかった時に使うテンプレートのメッセージの分岐処理
        // commentの入力があった場合には$outgo_assessmentは使用されない
        switch($request->outgo) {
            case $request->outgo <= 10000:
                $outgo_assessment = 'かなり押さえることができました。';
            break;
            case $request->outgo <= 30000:
                $outgo_assessment = 'ぼちぼちでした。';
            break;
            case $request->outgo <= 50000:
                $outgo_assessment = '少し押さえることができました。';
            break;
            case $request->outgo <= 100000:
                $outgo_assessment = '平均的でした。';
            break;
            case $request->outgo <= 200000:
                $outgo_assessment = '使いすぎました。';
            break;
            case $request->outgo <= 1000000:
                $outgo_assessment = '冷や汗が出るほど使いました。';
            break;
            default:
                $outgo_assessment = '秘密です。';
        }

        // titleとcommentの入力がなかった場合のデフォルトテンプレート
        $default_title   = '今月もがんばりました。';
        $default_comment = '今月の収入は' . $request->income . '円で、クレジットカードの使用額は' . $outgo_assessment;

        // incomeインスタンスへのinsert処理
        $income->fill([
            'user_id' => $request->user_id,
            'year' => $request->year,
            'month' => $request->month,
            'income' => $request->income,
            'outgo_cre' => $request->outgo,
        ]);

        // postインスタンスへのinsert処理
        // titleとbodyはnullableにしてあるので、入力がなかった時はデフォルト値を設定している
        $post->fill([
            'user_id' => $request->user_id,
            'income_id' => $request->user_id,
            'title' => $request->title ?? $default_title,
            'body' => $request->comment ?? $default_comment,
            'year' => $request->year,
            'month' => $request->month,
            'check' => (bool)$request->done,
        ]);

        $income->save();
        $post->save();

        return redirect()->route('profile.show_profile', ['id' => $request->user_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

}
