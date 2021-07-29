<?php

namespace App\Http\Controllers;

use App\Epreuve;
use App\Filiere;
use App\Etablissement;
use Illuminate\Http\Request;

class EpreuveController extends Controller
{
    public function index()
    {
        $epreuve = Epreuve::all();
        return view('admin.librairie.epreuves.index', compact('epreuve'));
    }

    public function vue_Epreuve(Epreuve $epr_id)
    {
        return view('admin.librairie.epreuves.vue', ['epreuve'=>$epr_id]);
    }

    public function create()
    {
        $fil = Filiere::all();
        $ets = Etablissement::all();
        return view('admin.librairie.epreuves.create', compact('fil','ets'));
    }

    public function store()
    {
        $epreuve = request()->validate([
            'etablissement_id'=>'required',
            'filiere_id'=>'required',
            'libelle_epreuve'=>'required',
            'type'=>'required',
            'annee_epreuve'=>'required',
            'photo_epreuve'=>'required',    
            'pdf_epreuve'=>'required'    
        ]);

        $file = request()->file('pdf_epreuve');
        $image = request()->file('photo_epreuve');
        
        if($image->extension() == 'jpg' || $image->extension() == 'jpeg' || $image->extension() == 'png'){
            if($file->extension() == 'pdf'){
                $epreuve = new Epreuve();
                $epreuve->etablissement_id = request('etablissement_id');
                $epreuve->filiere_id = request('filiere_id');
                $epreuve->libelle_epreuve = request('libelle_epreuve');
                $epreuve->type = request('type');
                $epreuve->annee_epreuve = request('annee_epreuve');
                $epreuve->photo_epreuve = $image->getClientOriginalName();
                $epreuve->pdf_epreuve = $file->getClientOriginalName();
                $epreuve->save();

                $this->photo_Epreuve($epreuve);
                $this->upload_Epreuve($epreuve);
            }
            session()->flash('message', 'Nouvelle Epreuve Inserée');
            return redirect()->route('epreuve');
        }
        else {
            session()->flash('message', 'Probleme avec lextension de fichier ');
            return back();
        }   
    }

    public function edit(Epreuve $epr_id)
    {
        $fil = Filiere::all();
        $ets = Etablissement::all();
        return view('admin.librairie.epreuves.edit', ['epr'=>$epr_id,'fil'=>$fil,'ets'=>$ets]);
    }

    public function update(Epreuve $epr_id)
    {
        $epreuve = request()->validate([
            'etablissement_id'=>'required',
            'filiere_id'=>'required',
            'libelle_epreuve'=>'required',
            'type'=>'required',
            'annee_epreuve'=>'required'    
        ]);
        $epr_id->update($epreuve);
        session()->flash('message', 'Modification Effectuée');
        return redirect()->route('epreuve');
    }

    public function destroy(Epreuve $epr_id)
    {
        $epr_id->delete();
        return back();
    }

    private function upload_Epreuve(Epreuve $epreuve)
    {
        $file = request()->file('pdf_epreuve');
        if ($file) {
            // $url = $file->path();
            $ext = $file->extension();
            $name = $file->getClientOriginalName();
            // $original= Str::before($name, ".");  
            if ($ext == "pdf") {
                $pdf = $file->storeAs('public',$epreuve['libelle_epreuve'].'-'.$name);                                      
            }
        }
    }

    private function photo_Epreuve(Epreuve $epreuve)
    {
        $file = request()->file('photo_epreuve');
        if ($file) {
            $ext = $file->extension();
            $name = $file->getClientOriginalName();
            if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
                $pdf = $file->storeAs('public',$epreuve['libelle_epreuve'].'-'.$name);                                      
            }
        }
    }
}
