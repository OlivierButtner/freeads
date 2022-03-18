<?php

namespace App\Http\Controllers;

use App\Models\Ad;

class CreateAdController extends Controller
{
    public function formulaire()
    {
        if (auth()->guest()) {
            flash('Vous devez être connecté pour voir cette page !!!')->error();

            return redirect('/connexion');
        }
        return view('/createAd');
    }

    public function traitement()
    {


        request()->validate([
            'title' => ['required'],
            'category' => ['required'],
            'description' => ['required', 'min:5', 'max:140'],
            'picture' => ['required', 'image'],
            'location' => ['required'],
            'price' => ['required', 'regex:/^\d*(\.\d{2})?$/', 'min:0']


        ]);

        $path = request("picture")->store("pictures", "public");


        Ad::create([
            'user_id' => auth()->user()->id,
            'title' => request('title'),
            'category' => request('category'),
            'description' => request('description'),
            'picture' => $path,
            'location' => request('location'),
            'price' => request('price')]);
        flash("Creation Ad effectué: " . request('title') . "/" . request('category'))->success();

        return redirect('/mon-compte');
    }


}

