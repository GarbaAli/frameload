<?php

namespace App\Http\Controllers\Admin;

use App\SouscatForum;
use App\CategorieForum;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SouscatForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('can:edit-users');
    }


    public function index(CategorieForum $categorie)
    {
        return view('admin.souscatForum.delete.index', compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategorieForum $categorie)
    {
        return view('admin.souscatForum.create', compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategorieForum $categorie)
    {
        $data = request()->validate([
            'libelle' =>'required|min:2|max:150',
            'image' => 'max:3000',
        ]);

        if(request()->hasFile('image'))
        {
            $destination_path = 'public/forums';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $imagePath = $request->file('image')->storeAs($destination_path, $image_name);
            $data['image'] = $image_name;
         
        }
        $categorie->sousCategories()->create($data);

        session()->flash('message', 'Nouvelle Sous-categorie pour '.$categorie->libelle);

        return redirect()->route('categorieForum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SouscatForum  $souscatForum
     * @return \Illuminate\Http\Response
     */
    public function show(CategorieForum $categorie)
    {
        return view('admin.souscatForum.show', compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SouscatForum  $souscatForum
     * @return \Illuminate\Http\Response
     */
    public function edit(SouscatForum $souscatForum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SouscatForum  $souscatForum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SouscatForum $souscatForum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SouscatForum  $souscatForum
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategorieForum $categorie, SouscatForum $souscategorie)
    {
        $souscategorie->delete();

        session()->flash('message', 'Suppression de la sous-categorie '.$souscategorie->libelle.' dans la categorie '.$categorie->libelle);

        return redirect()->route('souscat.index', $categorie);
    }
}
