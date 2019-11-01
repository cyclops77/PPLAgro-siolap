<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetaniController extends Controller
{
    public function list()
    {
    	$petani = \App\User::where('role','=','petani')->get();
    	return view('petani.index', compact('petani'));
    }
}
