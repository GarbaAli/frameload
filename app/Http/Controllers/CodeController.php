<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CodeRapport;
use Carbon\Carbon;
use PDF;

class CodeController extends Controller
{
    public function index()
    {
        $codes = CodeRapport::all();
        return view('admin.code_rapports.index', compact('codes'));
    }

    public function generer()
    {
        for($i=1;$i<=100;$i++){
            $min = 1;
            $max = 6;
    
            $code = (rand($min, $max));
            $Chaine = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // 62 caractères au total
            // on mélange la chaine avec la fonction str_shuffle(), propre à PHP
            $Chaine = str_shuffle($Chaine);
            // ensuite on coupe à la longueur voulue avec la fonction substr(), propre à PHP aussi
            $Chaine = substr($Chaine,0,6);
            $code = new CodeRapport();
            $code->code = $Chaine;
            $code->save();
        }
        return back();
    }

    public function imprimer()
    {
        $day = Carbon::now('UTC');
        $today = $day->isoFormat('LLLL'); // mettre la date sous le format lundi 02 janvier 12:30
        $codes = CodeRapport::all();
        $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->loadView('admin.code_rapports.code_pdf',compact('codes','today'));
        return $pdf->stream();
    }
}
