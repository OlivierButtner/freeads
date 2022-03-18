<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    public function listeAds()
    {
        //$ads= \App\Models\Ad::all();
        $ads = DB::select('select users.nickname,ads.* FROM users,ads WHERE users.id=ads.user_id ORDER BY ads.updated_at DESC;');
        // $ads = DB::table('ads')
        //     ->join('users', 'ads.id', '=', 'users.id')
        //     ->select('ads.*', 'user.nickname')
        //     ->get();


        // $ads = \App\Models\Ad::all();

        return view('/index', ['ads' => $ads]);
    }

    public function search()
    {
        request()->validate(['search' => ['required']

        ]);

        $search = request('search');

        // $ads= \App\Models\Ad::all();
        $requete = "SELECT users.nickname,ads.* FROM ads,users WHERE  ads.user_id=users.id AND (concat(ads.title,ads.description,ads.location,ads.price) LIKE '%$search%' OR users.nickname LIKE '%$search%');";

        $ads = DB::select($requete);

        return view('/index', ['ads' => $ads]);
    }

    public function orderBy()
    {
        request()->validate(['submit' => ['required']

        ]);
        $order;
        switch (request('submit')) {
            case "A to z":
                $order = "ads.title ASC";
                break;
            case "Z to a":
                $order = "ads.title DESC";
                break;

            case "Price asc":
                $order = "ads.price ASC";
                break;
            case "Price desc":
                $order = "ads.price DESC";
                break;
            case "Date asc":
                $order = "ads.updated_at ASC";
                break;
            case "Date desc":
                $order = "ads.updated_at DESC";
                break;
            default :
                $order = "ads.updated_at ASC";
                break;
        }

        $requete = "select users.nickname,ads.* FROM users,ads WHERE users.id=ads.user_id ORDER BY $order;";
        $ads = DB::select($requete);


        return view('/index', [
            'ads' => $ads]);


    }
}

// $ads = DB::select('select users.nickname,category.id,ads.* FROM users,ads,category WHERE users.id=ads.user_id AND category.id=ad.category_id;');

