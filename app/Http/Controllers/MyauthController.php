<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\reguser;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class MyauthController extends Controller
{
   use AuthenticatesUsers;
   protected $redirectTo = 'useraccount';

    // public function __construct()
    //  {
    //      $this->middleware('auth')->('logout');
    //  }

    public function showregform()
    {

        return view('register');
    }


    public function showloginform()
    {

        return view('login');
    }


    public function welcomepage()
    {

        return view('home');
    }



    public function registerform(Request $request)
    {
        $this->validate($request, [
             'username' => 'required|unique:regusers|max:255',
             'firstname' => 'required|max:255',
             'lastname' =>'required|max:255',
             'email' =>'required|unique:regusers|email',
             'password' =>'required|confirmed|max:255',
        ]);
        // return $request->all();

        // reguser::create($request->all());
        reguser::create([
            'username' => $request['username'],
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
    
        return redirect('/')->with('Status','You Are Registered.. You may now login with your email id and password');
    }

    public function loginform(Request $request)
    {
        $this->validate($request, [
             'email' =>'required|email',
             'password' =>'required|max:255',
        ]);
          $credentials=array('email' => $request->email,'password' => $request->password);
         // return $credentials;
         if (Auth::attempt($credentials)){

             //$this->checklogin($request);
             //return "success";
            // $this->middleware('guest')->except('logout');
             return redirect('useraccount')->with('Status','You are now logged in');
            
         } else {
          
             return "fail";
             //return redirect('/')->with('Status','You Are Registered.. You may now login with your email id and password');
          }
    }

        //   public function checklogin(Request $request)
        //   {
        //       return view ('useraccount')->middleware('RedirectIfAuthenticated');
        //   }
    }

 

    


