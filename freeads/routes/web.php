<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::post('/', 'App\Http\Controllers\AdsController@search');
Route::get('/', 'App\Http\Controllers\AdsController@listeAds');
Route::post('/', 'App\Http\Controllers\AdsController@orderBy');


Route::get('/connexion', 'App\Http\Controllers\ConnexionController@formulaire');
Route::post('/connexion', 'App\Http\Controllers\ConnexionController@traitement');

Route::get('/signup', 'App\Http\Controllers\SignUpController@formulaire');
Route::post('/signup', 'App\Http\Controllers\SignUpController@traitement');


//Route::get('/admin','App\Http\Controllers\CompteController@showUsers');
Route::get('/admin', 'App\Http\Controllers\CompteController@accueilAdmin');
Route::post('/admin', 'App\Http\Controllers\CompteController@accueilAdmin');

Route::get('/createAd', 'App\Http\Controllers\CreateAdController@formulaire');
Route::post('/createAd', 'App\Http\Controllers\CreateAdController@traitement');


Route::get('/mon-compte', 'App\Http\Controllers\CompteController@accueil');

Route::POST('/mon-compte', 'App\Http\Controllers\CompteController@accueil');

Route::get('/deconnexion', 'App\Http\Controllers\CompteController@deconnexion');


Route::get('/deleteUser/{id}', 'App\Http\Controllers\CompteController@deleteUser');
Route::get('/deleteAd/{id}', 'App\Http\Controllers\CompteController@deleteAd');


Route::get('/editAd/{id}', 'App\Http\Controllers\EditController@EditAd');
Route::post('/editAd/{id}', 'App\Http\Controllers\EditController@ValidAd');


Route::get('/editAdAdmin/{id}','App\Http\Controllers\EditController@EditAdAdmin');
Route::post('/editAdAdmin/{id}', 'App\Http\Controllers\EditController@ValidAdAdmin');

Route::get('/editUser/{id}','App\Http\Controllers\EditController@EditUser');
Route::post('/editUser/{id}', 'App\Http\Controllers\EditController@validUser');


Route::get('/editUserAdmin/{id}','App\Http\Controllers\EditController@EditUserAdmin');
Route::post('/editUserAdmin/{id}', 'App\Http\Controllers\EditController@validUserAdmin');

Route::get('/','App\Http\Controllers\adsController@listeAds');

