<?php

namespace App\Http\Controllers;

use App\Topics;
use App\SouscatForum;
use Illuminate\Http\Request;

class TopicsController extends Controller 
{
    public function __construct()
    {
        return $this->middleware('auth')->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SouscatForum $souscategorie)
    {
        return view('topics.create', compact('souscategorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => 'required|min:3|max:200',
            'content' => 'required|min:5',
            'souscat_forum_id' => 'required|integer'
        ]);

        // dd($data['souscat_forums_id']);
        Auth()->user()->topics()->create($data);

        return redirect()->route('forum.show', $data['souscat_forum_id']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function show(SouscatForum $souscategorie, Topics $topic)
    {
        return view('topics.show', compact(['souscategorie', 'topic']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function edit(SouscatForum $souscategorie, Topics $topic)
    {
        return view('topics.edit', compact(['souscategorie', 'topic']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SouscatForum $souscategorie,  Topics $topic)
    {
        $data = request()->validate([
            'title' => 'required|min:3|max:200',
            'content' => 'required|min:5',
            'souscat_forum_id' => 'required|integer'
        ]);

       $topic->update($data);

        return redirect()->route('forum.show', $souscategorie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Topics  $topics
     * @return \Illuminate\Http\Response
     */
    public function destroy(SouscatForum $souscategorie,  Topics $topic)
    {
        $topic->delete();

        return redirect()->route('forum.show', $souscategorie);
    }
}
