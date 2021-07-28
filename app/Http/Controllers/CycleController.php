<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cycle;

class CycleController extends Controller
{
    public function index()
    {
        $cycles = Cycle::all();
        return view('admin.librairie.cycles.index', compact('cycles'));
    }

    public function create()
    {
        return view('admin.librairie.cycles.create');
    }

    public function store()
    {
        $cycle = request()->validate([
            'code_cycle'=>'required',
            'libelle_cycle'=>'required'
        ]);
        Cycle::create($cycle);
        return redirect()->route('cycle');
    }

    public function edit(Cycle $cycle_id)
    {
        return view('admin.librairie.cycles.edit', ['cycle'=>$cycle_id]);
    }

    public function update(Cycle $cycle_id)
    {
        $cycle = request()->validate([
            'code_cycle'=>'required',
            'libelle_cycle'=>'required'
        ]);
        $cycle_id->update($cycle);
        return redirect()->route('cycle');
    }

    public function destroy(Cycle $cycle_id)
    {
        $cycle_id->delete();
        return back();
    }
}
