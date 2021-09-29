<?php

namespace App\Http\Controllers;

use App\Cycle;
use App\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    
        public function index(){
            $filiere = Filiere::all(); 
            $cycle = Cycle::all();
            return view('admin.librairie.filieres.index', compact('filiere','cycle'));
        }
    
        public function create(){
            $cycle = Cycle::all();
            return view('admin.librairie.filieres.create', compact('cycle'));
        }
    
        public function store(Request $request){
            $fil = request()->validate([
                'cycle_id'=>'required',
                'code_filiere'=>'required',
                'libelle_filiere'=>'required'
            ]);
            Filiere::create($fil);
            session()->flash('message', 'Nouvelle Filiere');
            return redirect()->route('filiere');
        }
    
        public function edit(Filiere $fil_id){
            $cycle = Cycle::all();
            return view('admin.librairie.filieres.edit', ['fil'=>$fil_id, 'cycle'=>$cycle]);
        }
    
        public function update(Filiere $fil_id){
            $fil = request()->validate([
                'cycle_id'=>'required',
                'code_filiere'=>'required',
                'libelle_filiere'=>'required'
            ]);
            $fil_id->update($fil);
            session()->flash('message', 'Filiere Modifié');
            return redirect()->route('filiere');
        }
    
        public function destroy(Filiere $fil_id){
            $fil_id->delete();
            session()->flash('message', 'Filiere Supprimé');
            return back();
        }
    
}
