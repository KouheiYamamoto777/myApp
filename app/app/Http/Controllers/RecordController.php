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
        $validated = $request->validated();
        dd($validated);
        $income->fill([
            'user_id' => $request->user_id,
            'year' => $request->year,
            'month' => $request->month,
            'income' => $request->income,
            'outgo_cre' => $request->outgo,
        ]);

        $post->fill([
            'user_id' => $request->user_id,
            'income_id' => $request->user_id,
            'title' => $request->title,
            'body' => $request->comment,
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
