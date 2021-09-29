<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Epreuve;
use App\Filiere;
use App\Rapport;
use App\CodeRapport;
use App\TelechargerEpreuve;
use PDF;

class LibrairieController extends Controller
{
    public function index()
    {
        return view('librairie.index');
    }

    public function show_epreuve()
    {
        $epreuve = Epreuve::all(); 
        return view('librairie.epreuve.show_epreuve', compact('epreuve'));
    }

    public function view_epreuve(Epreuve $epr_id)
    {
        //Détermination de la taille d'un fichier 
        $size = Storage::size('public/'.$epr_id->libelle_epreuve.'-'.$epr_id->pdf_epreuve);
        $size = number_format($size / 1048576,2); // Mb
        $size = number_format($size / 1024); // Kb
        return view('librairie.epreuve.view_epreuve', ['epr'=>$epr_id]);
    }

    public function epreuve_PDF(Epreuve $epr_id)
    {
        $file_path = public_path('storage/'.$epr_id->libelle_epreuve.'-'.$epr_id->pdf_epreuve);

        //return PDF::loadFile($file_path)->stream('download.pdf');

        return response()->download($file_path);
    }

    public function recherche (Request $request)
    {
        $q = $request->input('q');
        $epreuve = Epreuve::where('libelle_epreuve','like','%'. $q .'%')->get();
        return view('librairie.epreuve.search_epreuve', compact('epreuve'));
    }

    


/* RAPPORT */
    public function show_rapport()
    {
        $rapport = Rapport::where('statut', 0)->get();
        return view('librairie.rapport.show_rapport', compact('rapport'));
    }

    public function create()
    {
        $fil = Filiere::all();
        return view('librairie.rapport.create', compact('fil'));
    }

    public function store()
    {
        $rapport = request()->validate([
            'filiere_id'=>'required',
            'auteur_rapport'=>'required',
            'theme_rapport'=>'required',
            'annee_rapport'=>'required',
            'description'=>'required',
            'rapport'=>'required'
            //'photo_rapport'=>'required'    
        ]);

        $file = request()->file('rapport');
        $image = request()->file('photo_rapport');
       // if ($image->extension() == "jpg" || $image->extension() == "jpeg" || $image->extension() == "png") {
            if ($file->extension() == "pdf") {
                $data = new Rapport();
                $data->filiere_id = request('filiere_id');
                $data->auteur_rapport = request('auteur_rapport');
                $data->theme_rapport = request('theme_rapport');
                $data->annee_rapport = request('annee_rapport');
                $data->description = request('description');
                $data->rapport = $file->getClientOriginalName();
                //$data->photo_rapport = $image->getClientOriginalName();
                $data->save();

                $this->upload_Rapport();
                // $this->photo_Rapport();
                return redirect()->route('show_rapport');
            }
            else{
                return back();
            }
            
        // }
        // else{
        //     return back();
        // }
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

    public function view_rapport(Rapport $rap_id)
    {
        //Détermination de la taille d'un fichier 
        $size = Storage::size('public/Rapport-'.$rap_id->rapport);
        $size = number_format($size / 1048576,2); // Mb
        $size = number_format($size / 1024); // Kb

        return view('librairie.rapport.view_rapport', ['rapports'=>$rap_id]);
    }

    public function search (Request $request)
    {
        $q = $request->input('q');
        $rapport = Rapport::where('theme_rapport','like','%'. $q .'%')
                            ->where('statut', 0)->get();
        return view('librairie.rapport.search_rapport', compact('rapport'));
    }
    
    public function Download_Code(Rapport $rap_id)
    {
        $code = request()->input('code');
        $result = CodeRapport::where('code', $code)->get();

        if(count($result) == 0)
        {
            return redirect()->route('show_rapport');
        }
        else { 
            CodeRapport::where('code', $code)->select('id')->delete();
            $file_path = public_path('storage/Rapport-'.$rap_id->rapport);
            return response()->download($file_path);
        }
    }
}
