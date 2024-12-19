<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membres;

class MembresController extends Controller
{
    public function liste_membres()
    {
        return view('membres.liste');
    }

    public function ajouter_membre()
    {
        return view('membres.ajouter');
    }

    public function ajouter_membre_traitement(Request $request)
    {
        $request->validate([
            'nom' => 'require',
            'prenom' => 'require',
        ]);

        $membre = new Membres();
        $membre->nom = $request->nom;
        $membre->prenom =$request->prenom;
        $membre->save();

        return redirect('/ajouter')->with('status', 'Le Membre a bien été ajouté.');
    }
}
