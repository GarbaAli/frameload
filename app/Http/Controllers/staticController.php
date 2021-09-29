<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class staticController extends Controller
{
    public function propos()
    {
        return view('staticPage.about');
    }

    public function vente()
    {
        return view('staticPage.condition_vente');
    }
    public function mention_legale()
    {
        return view('staticPage.mention_legale');
    }

    public function condition()
    {
        return view('staticPage.condition');
    }

    public function contact()
    {
        return view('staticPage.contact');
    }
}
