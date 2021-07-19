<?php

namespace App\Http\Controllers;

use App\CategoriePost;
use Illuminate\Http\Request;

class CategoriePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategoriePost::all();
        return view('admin.categoriePost.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoriePost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
            'libelle' => 'required|min:3|max:200'
        ]);

        $categorie = new CategoriePost();
        $categorie->libelle = request('libelle');
        $categorie->save();

        return redirect()->route('categoriePost.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategoriePost  $categoriePost
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriePost $categoriePost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategoriePost  $categoriePost
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriePost $categoriePost)
    {
        return view('admin.categoriePost.edit', compact('categoriePost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CategoriePost  $categoriePost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriePost $categoriePost)
    {
        $request->validate([
            'libelle' => 'required|min:3|max:200'
        ]);

        $categoriePost->update([
            'libelle' => $request->libelle
        ]);

      
        session()->flash('message', 'Mis a Jour de categorie');
        return redirect()->route('categoriePost.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategoriePost  $categoriePost
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriePost $categoriePost)
    {
        $categoriePost->delete();

        session()->flash('message', 'Suppression d\'une categorie');
        return redirect()->route('categoriePost.index');
    }
}
