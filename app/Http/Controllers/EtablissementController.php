<?php

namespace App\Http\Controllers;

use App\Etablissement;
use Illuminate\Http\Request;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ets = Etablissement::all();
        return view('admin.librairie.etablissements.index', compact('ets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.librairie.etablissements.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = request()->validate([
            'code_ets'=>'required',
            'libelle_ets'=>'required'
        ]);
        Etablissement::create($req);
        session()->flash('message', 'Vous venez de creer un nouvel Etablissement');
        return redirect()->route('ets');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    public function show(Etablissement $etablissement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Etablissement  $etablissement
     * @return \Illuminate\Http\Response
     */
    
    public function edit(Etablissement $ets_id){
        return view('admin.librairie.etablissements.edit', ['ets'=>$ets_id]);
    }

    public function update(Etablissement $ets_id){
        $req = request()->validate([
            'code_ets'=>'required',
            'libelle_ets'=>'required'
        ]);
        $ets_id->update($req);
        session()->flash('message', 'Vous venez de Modifier un Etablissement');
        return redirect()->route('ets');
    }

    public function destroy(Etablissement $ets_id)
    {
        $ets_id->delete();
        session()->flash('message', 'Etablissement Supprimé');
        return back();
    }
}
