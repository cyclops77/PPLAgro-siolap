<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(Request $req)
    {
    	$user = new \App\User;
    	$user->role = 'petani';
    	$user->id = mt_rand(10000,19999);
    	\App\Petani::create([
    		'id' => mt_rand(1000,1999),
    		'user_id' => $user->id,
    		'name' => $req->name,
    	]);
    	$user->name = $req->name;
    	$user->email = $req->email;
    	$user->password = bcrypt($req->password);
    	$user->save();

    	return redirect()->back()->with('sukses','Berhasil membuat akun');
    }
}
