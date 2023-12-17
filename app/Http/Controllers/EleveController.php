<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Eleve;
use Illuminate\Http\Request;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eleves = Eleve::paginate(10);
        return inertia(
            'Eleve/Index',
            compact('eleves')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cycles = Cycle::orderBy('libelle')->get();
        return inertia("Eleve/Create",
        compact('cycles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Eleve::create($request->validate([
            'nom'   => 'string|required',
            'prenom'   => 'string|required',
            'naissance' =>'sometimes|date',
            'sexe'  =>'required|in:F,M',
            'lieu'  => 'sometimes|string'
        ]));
        // return response()->redirectTo("/eleves");
        return redirect()
            ->route("eleves.index")
            ->with('success','Eleve ajouter avec succes.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $eleve = Eleve::find($id);
        return inertia('Eleve/Update',compact('eleve'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $eleve = Eleve::find($id);
        $eleve->nom = $request->nom;
        $eleve->prenom = $request->prenom;
        $eleve->sexe = $request->sexe;
        $eleve->naissance = $request->naissance;
        $eleve->lieu = $request->lieu;
        $eleve->save();
        return redirect()->route('eleves.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eleve = Eleve::find($id);
        $eleve->delete();
        return redirect()->back()
            ->with('success','Suppression reussie');
    }
}
