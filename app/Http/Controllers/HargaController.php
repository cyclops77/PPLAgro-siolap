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
            ->where('jenis_komoditas','=','kedela')
            ->get(); 

            $jagung = \App\Produk::where('isverify','=','no')
            ->where('jenis_komoditas','=','jagung')
            ->get(); 

        return view('verify.index', compact('semua','tebu','tembakau','kedelai','padi', 'jagung'));    
    }
    public function verifNow(Request $req)
    {
    	\App\Produk::where('id','=',$req->idnya)
    		->update([
    			'isverify' => 'yes',
    		]);
    	return redirect()->back();	
    }
    public function DontVerif(Request $req)
    {
        \App\Produk::where('id','=',$req->idnya)
            ->update([
                'isverify' => 'repeat',
            ]);

        if ($req->cek == "AA") {
            $kategori = "Harga tidak sesuai";
        }else if ($req->cek == "BB") {
            $kategori = "Foto kurang jelas";
        }else if ($req->cek == "CC") {
            $kategori = "Foto tidak sesuai";
        }    

        \App\ProdukStatus::create([
            'id' => mt_rand(100000,999999),
            'produk_id' => $req->idnya,
            'kategori' => $kategori,
            'keterangan' => $req->keterangan,
        ]);            
        return redirect('/verif-harga')->with('gagal','berhasil menolak barang');  
    }
}
