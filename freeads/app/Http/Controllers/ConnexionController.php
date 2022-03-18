<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConnexionController extends Controller
{

    public function formulaire()
    {
        return view('connexion');
    }

    public function traitement()
    {
        request()->validate([

            'login' => ['required'],
            'password' => ['required']

        ]);

        $resultat = auth()->attempt([
            'email' => request('login'),
            'password' => request('password')
        ]);
        $resultat2 = auth()->attempt([
            'nickname' => request('login'),
            'password' => request('password')
        ]);


        if ($resultat || $resultat2) {
            flash("Vous etes maintenant connecté !")->success();
            return redirect("/mon-compte");
        }
        return back()->withInput()->withErrors([
            'login' => 'Vos identifiants sont incorrects',
        ]);
    }

}
