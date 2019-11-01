<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function isRole()
    {
        if (Auth()->user()->role == 'petani') {
            return view('homeRestoran');
        }else if (Auth()->user()->role == 'admin') {
            return view('homeAdmin');
        }else if (Auth()->user()->role == 'ahli gizi') {
            return view('homeAhliGizi');
        }
    }
    public function petaniID()
    {
        $myid = Auth::user()->id;
        $petaniID = \App\Petani::where('user_id','=',$myid)->first();
        return view('layouts.app',compact('petaniID'));
    }
    public function logout()
    {
        Auth::logout();
        return view('auth.login');
    }
}
