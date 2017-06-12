<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Auth::routes();

Route::get('',function(){

 return view('thanks');

 });


//Route::post('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/','MyauthController@welcomepage');
Route::get('show','MyauthController@showregform')->name('show');
Route::get('showlogin','MyauthController@showloginform')->name('showlogin');
Route::get('useraccount',function(){
  
   return view('useraccount');

 })->name('useraccount');




Route::post('register','MyauthController@registerform')->name('register');
Route::post('login','MyauthController@loginform')->name('login');




