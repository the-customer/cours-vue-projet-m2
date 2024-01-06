<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\Cycle;
use App\Models\Eleve;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    public function api_getClassesByCycle(string $id)
    {
        $cycle = Cycle::find($id);
        return $cycle->classes;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cycles = Cycle::orderBy('libelle')->get();
        $classes = Classe::with('inscriptions')->paginate(10);
        return inertia('Classe/Index',[
            'classes'       => $classes,
            'cycles'        => $cycles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        ['libelle' => $libelle,'cycle' => $cycle] = $request->validate([
            'libelle'   => 'string|max:50|min:2|unique:classes,libelle',
            'cycle'     => 'numeric'
        ],[
            'libelle.unique'    => 'Le libelle existe deja!',
            'libelle.min'    => 'Le libelle doit avoir au moins 2 caractere!'
        ]);

        Classe::create([
            'libelle'   => $libelle,
            'cycle_id'     => $cycle
        ]);

        return redirect()->route('classes.index')
                ->with('success','Classe ajoutée.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {

        $classe->load('inscriptions.eleve');
        $eleves = [];
        foreach ($classe->inscriptions as $c) {
            $eleves[] = $c->eleve;
        }
        return inertia('Classe/Show',[
            'classe'    => $classe,
            'eleves'    => $eleves
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classe $classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        //
    }
}
