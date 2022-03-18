<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditController extends Controller
{
    public function EditAd($id)
    {
        $ad = \App\Models\Ad::find($id);
        if (auth()->guest()) {
            flash('Vous devez etre connecté pour voir cette page !!!')->error();

            return redirect('/connexion');
        }
        return view('editAd', [
            'ad' => $ad]);

    }

    public function ValidAd()
    {


        request()->validate([
            'title' => ['required'],
            'category' => ['required'],
            'description' => ['required', 'min:5', 'max:20'],
            'picture' => ['required', 'image'],
            'location' => ['required'],
            'price' => ['required', 'regex:/^\d*(\.\d{2})?$/', 'min:0']

          request()->validate([
        'title'=>['required'],
        'category'=>['required'],
        'description'=>['required','min:5','max:20'],
        'picture'=>['required','image'],
        'location'=>['required'],
        'price'=>['required','regex:/^\d*(\.\d{2})?$/','min:0'],


        ]);

        $path = request("picture")->store("pictures", "public");
        $ad = \App\Models\Ad::find(request('id'));

        $ad->title = request('title');
        $ad->category = request('category');
        $ad->description = request('description');
        $ad->picture = $path;
        $ad->location = request('location');
        $ad->price = request('price');
        $ad->save();

        flash("MAJ Ad efféctué: " . request('title') . "/" . request('category'))->success();

        return redirect('/mon-compte');
    }

    public function EditUser($id)
    {
        $user = \App\Models\User::find($id);
        if (auth()->guest()) {
            flash('Vous devez etre connecté pour voir cette page !!!')->error();

            return redirect('/connexion');
        }
        return view('editUser', [
            'user' => $user]);
    }

    public function validUser()
    {

        request()->validate([

            'nickname' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'confirmed', 'min:6'],
            'password_confirmation' => ['required'],
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',


        ]);


        $user = \App\Models\User::find(request('id'));
        $user->nickname = request('nickname');
        $user->email = request('email');
        $user->phone = request('phone');
        $user->password = bcrypt(request('password'));


        $user->save();

        // //Mail::to(request('email'))->send(new WelcomeUserMail());
        flash("MAJ User : " . request('nickname') . "/" . request('email'))->success();

        return redirect('/mon-compte');

}
    public function EditUserAdmin($id){
        $user=\App\Models\User::find($id);
        if(auth()->guest()){
        flash('Vous devez etre connecté pour voir cette page !!!')->error();

        return redirect('/connexion');
        }
        return view('editUserAdmin', [
        'user' => $user]);
    }

       public function validUserAdmin(){
           
          request()->validate([

          'nickname'=>['required'],
        'email'=>['required','email'],

        'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        
        

         ]);

        
       
        $user=\App\Models\User::find(request('id'));
        $user->nickname=request('nickname');
        $user->email=request('email');
        $user->phone=request('phone');





         $user->save();

        // //Mail::to(request('email'))->send(new WelcomeUserMail());
        flash("MAJ User : ". request('nickname')."/".request('email'))->success();

        return redirect('/mon-compte');
}

public function EditAdAdmin($id){
         $ad=\App\Models\Ad::find($id);
          if(auth()->guest()){
        flash('Vous devez etre connecté pour voir cette page !!!')->error();

        return redirect('/connexion');
        }
        return view('editAdAdmin', [
        'ad' => $ad]);
        
    }

       public function ValidAdAdmin(){
      

       

          request()->validate([
        'title'=>['required'],
        'category'=>['required'],
        'description'=>['required','min:5','max:20'],

        'location'=>['required'],
        'price'=>['required','regex:/^\d*(\.\d{2})?$/','min:0'],
        

         ]);


          $ad=\App\Models\Ad::find(request('id'));

         $ad->title=request('title');
        $ad->category=request('category');
        $ad->description=request('description');

        $ad->location=request('location');
        $ad->price=request('price');
        $ad->save();

        flash("MAJ Ad efféctué: ". request('title')."/".request('category'))->success();

        return redirect('/mon-compte');
       }


}
