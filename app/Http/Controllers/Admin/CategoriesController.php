<?php

namespace App\Http\Controllers\Admin;

use App\CategorieForum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = CategorieForum::all();
        return view('admin.categorieForum.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorieForum.create');
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

        $categorie = new CategorieForum();
        $categorie->libelle = request('libelle');
        $categorie->save();

        session()->flash('message', 'Nouvelle Categorie dans le Forum');
        return redirect()->route('categorieForum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CategorieForum  $categorieForum
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieForum $categorieForum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CategorieForum  $categorieForum
     * @return \Illuminate\Http\Response
     */
    public function edit(CategorieForum $categorieForum)
    {

        return view('admin.categorieForum.edit', compact('categorieForum'));
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
        $request->validate([
            'libelle' => 'required|min:3|max:200'
        ]);

        $categorieForum->update([
            'libelle' => $request->libelle
        ]);

      
        session()->flash('message', 'Categorie a jour');
        return redirect()->route('categorieForum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CategorieForum  $categorieForum
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieForum $categorieForum)
    {
        $categorieForum->delete();

        session()->flash('message', 'Suppression de la categorie '.$categorieForum->libelle);
        return redirect()->route('categorieForum.index');
    }
}
