<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HargaController extends Controller
{
    public function index()
    {
    	$semua = \App\Produk::where('isverify','=','no')->get();

        $padi = \App\Produk::where('isverify','=','no')
            ->where('jenis_komoditas','=','padi')
            ->get();
        
        $tebu = \App\Produk::where('isverify','=','no')
            ->where('jenis_komoditas','=','tebu')
            ->get();            
        
        $tembakau = \App\Produk::where('isverify','=','no')
            ->where('jenis_komoditas','=','tembakau')
            ->get();

        $kedelai = \App\Produk::where('isverify','=','no')
            ->where('jenis_komoditas','=','kedelai')
            ->get(); 

        return view('verify.index', compact('semua','tebu','tembakau','kedelai','padi'));    
    }
    public function verifNow(Request $req)
    {
    	\App\Produk::where('id','=',$req->idnya)
    		->update([
    			'isverify' => 'yes',
    		]);
    	return redirect()->back();	
    }
}
