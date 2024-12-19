<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membres;

class MembresController extends Controller
{
    public function liste_membres()
    {
        $membres = Membres::all();
        return view('membres.liste', compact('membres'));
    }

    public function ajouter_membre()
    {
        return view('membres.ajouter');
    }

    public function ajouter_membre_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);

        $membre = new Membres();
        $membre->nom = $request->nom;
        $membre->prenom = $request->prenom;
        $membre->save();

        return redirect('/')->with('status', 'Le Membre a bien été ajouté.');
    }

    public function modifier_membre($id)
    {
        $membres = Membres::find($id);
        return view('membres.modifier', compact('membres'));
    }

    public function modifier_membre_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);

        $membre = Membres::find($request->id);
        $membre->nom = $request->nom;
        $membre->prenom = $request->prenom;
        $membre->update();

        return redirect('/')->with('status', 'Le Membre a bien été modifié.');
    }
}
