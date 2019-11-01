<?php

namespace App\Http\Controllers;

use Auth;
use App\Outlet;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function show(Outlet $outlet)
    {
    	$user = Auth::user();
    	$petani = \App\Outlet::where('user_id','=',$user->id)->first();
        return view('mitra.show', compact('outlet','user','petani'));
    }
}
