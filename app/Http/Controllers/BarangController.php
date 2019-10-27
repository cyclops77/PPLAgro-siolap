<?php

namespace App\Http\Controllers;


use Auth;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
    	$semua = \App\Produk::where('isverify','=','yes')->get();

    	$padi = \App\Produk::where('isverify','=','yes')
            ->where('jenis_komoditas','=','padi')
            ->get();
        
        $tebu = \App\Produk::where('isverify','=','yes')
            ->where('jenis_komoditas','=','tebu')
            ->get();            
        
        $tembakau = \App\Produk::where('isverify','=','yes')
            ->where('jenis_komoditas','=','tembakau')
            ->get();

        $kedelai = \App\Produk::where('isverify','=','yes')
            ->where('jenis_komoditas','=','kedelai')
            ->get(); 

    	return view('barang.index', compact('semua','tebu','tembakau','kedelai','padi'));
    }
    public function beli($id)
    {
        $produk = \App\Produk::where('id','=',$id)->first();
        return view('barang.beli',compact('produk'));
    }
    
    public function statusBaruBeli(Request $req)
    {
        $brg = \App\Produk::where('id','=',$req->produk_id)->first();
        $harga_total = ($brg->harga_barang*$req->total);

        $user = Auth::user();
        $mitraID = \App\Outlet::where('user_id','=',$user->id)->first();

        $b = new \App\Pembayaran;
        $b->id_pembelian = mt_rand(100000,999999);
        $b->mitra_id = $mitraID->id;
        $b->produk_id = $req->produk_id;
        $b->jumlah = $req->total;
        $b->harga_total = $harga_total;   
        $b->status_bayar = 'Belum Bayar';   
        $b->status_terkirim = 'Belum Terkirim';   
        $b->status_terima = 'Belum Terima';
        $b->save();   

        return redirect('/status-barang');
    }
}
