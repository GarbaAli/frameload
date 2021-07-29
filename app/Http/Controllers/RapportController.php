<?php

namespace App\Http\Controllers;

use App\Filiere;
use App\Rapport;
use Illuminate\Http\Request;

class RapportController extends Controller
{
    public function index()
    {
        $rapport = Rapport::all();
        return view('admin.librairie.rapports.index', compact('rapport'));
    }

    public function vue_Rapport(Rapport $rap_id)
    {
        return view('admin.librairie.rapports.vue', ['rapport'=>$rap_id]);
    }

    public function create()
    {
        $fil = Filiere::all();
        return view('admin.librairie.rapports.create', compact('fil'));
    }

    public function store()
    {
        $rapport = request()->validate([
            'filiere_id'=>'required',
            'auteur_rapport'=>'required',
            'theme_rapport'=>'required',
            'annee_rapport'=>'required',
            'description'=>'required',
            'prix'=>'required',
            'rapport'=>'required',
            'photo_rapport'=>'required',
            'statut'=>'required'    
        ]);

        $file = request()->file('rapport');
        $image = request()->file('photo_rapport');
        if ($image->extension() == "jpg" || $image->extension() == "jpeg" || $image->extension() == "png") {
            if ($file->extension() == "pdf") {
                $data = new Rapport();
                $data->filiere_id = request('filiere_id');
                $data->auteur_rapport = request('auteur_rapport');
                $data->theme_rapport = request('theme_rapport');
                $data->annee_rapport = request('annee_rapport');
                $data->description = request('description');
                $data->prix = request('prix');
                $data->rapport = $file->getClientOriginalName();
                $data->photo_rapport = $image->getClientOriginalName();
                $data->statut = request('statut');
                $data->save();

                $this->upload_Rapport();
                $this->photo_Rapport();
                return redirect()->route('rapport');
            }
            else{
                return back();
            }
            
        }
        else{
            return back();
        }
    }

    public function edit(Rapport $rap_id)
    {
        $fil = Filiere::all();
        return view('admin.librairie.rapports.edit', ['rap'=>$rap_id,'fil'=>$fil]);
    }

    public function update(Rapport $rap_id)
    {
        $rapport = request()->validate([
            'filiere_id'=>'required',
            'auteur_rapport'=>'required',
            'theme_rapport'=>'required',
            'annee_rapport'=>'required',
            'description'=>'required',
            'prix'=>'required',
            'statut'=>'required'    
        ]);
        $rap_id->update($rapport);
        return redirect()->route('rapport');
    }

    public function destroy(Rapport $rap_id)
    {
        $rap_id->delete();
        return back();
    }

    private function upload_Rapport()
    {
        $file = request()->file('rapport');
        if ($file) {
            // $url = $file->path();
            $ext = $file->extension();
            $name = $file->getClientOriginalName();
            // $original= Str::before($name, ".");
            if ($ext == "pdf") {
                $pdf = $file->storeAs('public','Rapport-'.$name);                                      
            }
        }

    }

    private function photo_Rapport()
    {
        $file = request()->file('photo_rapport');
        if ($file) {
            $ext = $file->extension();
            $name = $file->getClientOriginalName();
            if ($ext == "jpg" || $ext == "jpeg" || $ext == "png") {
                $pdf = $file->storeAs('public','Rapport-'.$name);                                      
            }
        }

    }
}
