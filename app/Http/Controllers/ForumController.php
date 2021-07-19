<?php

namespace App\Http\Controllers;

use App\SouscatForum;
use App\CategorieForum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategorieForum::all()->sortByDesc('libelle');
        return view('forum.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategorieForum  $categorieForum
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieForum $categorieForum, SouscatForum $souscategorie)
    {
        return view('forum.show', compact(['categorieForum', 'souscategorie']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategorieForum  $categorieForum
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorieForum $categorieForum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategorieForum  $categorieForum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategorieForum $categorieForum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategorieForum  $categorieForum
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieForum $categorieForum)
    {
        //
    }

    public function search(Request $request)
    {
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('topics')->where('title', 'LIKE',"%{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative;padding:10px;width: 100%;background-color:silver">';
            foreach($data as $row){
                $output .= '<li class="tags"><a style="font=size:17px; color:black; font-weight:bold" href="forum/'. $row->souscat_forum_id .'/'. $row->title .'/show"> '. $row->title .' </a></li><hr>';
            }
            $output .= '</ul>';  
            echo $output;
                        
        }
    }
}
