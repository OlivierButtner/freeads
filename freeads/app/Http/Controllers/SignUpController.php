<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;

use App\User;

class SignUpController extends Controller
{
    public function formulaire(){
        return view('/signup');
    }

       public function traitement(){
           
          request()->validate([
        'nickname'=>['required'],
        'email'=>['required','email'],
        'password'=>['required','confirmed','min:6'],
        'password_confirmation'=>['required'],
        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        

         ]);

         $user =  \App\Models\User::create([
        'nickname'=>request('nickname'),
        'email'=>request('email'),
        'phone'=>request('phone'),
        'admin'=> "0",
        'password'=>bcrypt(request('password'))
    ]);
        Mail::to(request('email'))->send(new WelcomeUserMail());
        flash("Nous avons recu votre inscription : ". request('nickname')."/".request('email'))->success();

        return redirect('/');
       }


       
       
}
