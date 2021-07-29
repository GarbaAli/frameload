<?php

namespace App\Http\Controllers\Admin;

use App\Epreuve;
use App\Filiere;
use App\Rapport;
use App\Etablissement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $epr = Epreuve::all();
        $epreuves = count($epr);

        $ets = Etablissement::all();
        $etabs = count($ets);

        $fil = Filiere::all();
        $filieres = count($fil);

        $rap = Rapport::all();
        $rapports = count($rap);

        return view('admin.dashboard', compact('epreuves','etabs','filieres','rapports'));
    }
}
