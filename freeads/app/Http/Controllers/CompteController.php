<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;



class CompteController extends Controller
{
    public function accueil(){


        if(auth()->guest()){
            flash('Vous devez etre connecté pour voir cette page !!!');

            return redirect('/connexion');
        }



        $ads = \App\Models\Ad::where('user_id',auth()->user()->id)->get();

        return view('mon-compte', [
        'ads' => $ads]);
    }

    public function accueilAdmin(){


        if(auth()->guest()){
            flash('Vous devez etre connecté pour voir cette page !!!');

            return redirect('/connexion');
        }elseif(!auth()->user()->admin){
            flash('Vous devez etre adminstarteur pour voir cette page !!!');

            return redirect('/');
        }

        $users = \App\Models\User::all();
        $ads = DB::select('select users.nickname,ads.* FROM users,ads WHERE users.id=ads.user_id;');
        // $ads = DB::table('ads')
        //     ->join('users', 'ads.id', '=', 'users.id')
        //     ->select('ads.*', 'user.nickname')
        //     ->get();


        // $ads = \App\Models\Ad::all();

        return view('admin', [
        'users' => $users,'ads' => $ads]);
    }

    public function deconnexion(){
        auth()->logout();
        flash("Vous etes maintenant déconnecté !")->success();
        return redirect('/');
    }

    public function deleteUser($id){
            $user=\App\Models\User::find($id);
            $ads = \App\Models\Ad::where('user_id',$id)->get();
            foreach($ads as $ad){
                $ad->delete();
            }
            $user->delete();

            flash("Utilisateur supprimé avec succés avec toutes ses annonces !")->success();
            return back();



    }
    public function deleteAd($id){
            $ad=\App\Models\Ad::find($id);
            $ad->delete();

            flash("Utilisateur supprimé avec succès !")->success();
            return back();



    }




    // public function modificationMDP(){
    //      if(auth()->guest()){
    //         flash('Vous devez etre connecté pour voir cette page !!!')->error();

    //         return redirect('/connexion');
    //     }
    //     request()->validate([
    //         'password' => ['required','confirmed','min:4'],
    //         'password_confirmation' =>['required']
    //     ]);

    //     auth()->user()->update([
    //         'password'=>bcrypt(request('password'))
    //     ]);
    //     flash("Votre mot de passe a bien été mis a jour.")->success();
    //     return redirect('/mon-compte');

    // }
}
