<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
    	$userid = Auth::user()->id;
    	$mitra = \App\Outlet::where('user_id','=',$userid)->first();

    	$lol = \App\PembelianUnverified::select('*','pembelian_unverifed.created_at as tgl')
    		->join('pembelian','pembelian.id_pembelian','=','pembelian_unverifed.pembelian_id')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('mitra_id','=',$mitra->id)
	    	->get();

	   	$telatBayar = \App\PembelianUnverified::select('*')
    		->join('pembelian','pembelian.id_pembelian','=','pembelian_unverifed.pembelian_id')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('mitra_id','=',$mitra->id)
    		->where('keterangan','=','Tidak Melakukan Transaksi')
	    	->get();

	    $editan = \App\PembelianUnverified::select('*')
    		->join('pembelian','pembelian.id_pembelian','=','pembelian_unverifed.pembelian_id')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('mitra_id','=',$mitra->id)
    		->where('keterangan','=','Gambar teridentifikasi hasil edit')
	    	->get();	

        // $sedangKirim = \App\Pembayaran::select('*')
        //     ->where('status_terima','=','Sedang Mengirim')
        //     ->where('mitra_id','=',$mitra->id)
        //     ->get();
        $sedangKirim = \App\Pembayaran::select('*')
            ->join('produk','produk.id','=','pembelian.produk_id')
            ->where('status_terkirim','=','Sedang Mengirim')
            ->where('mitra_id','=',$mitra->id)
            ->get();    

	    // dd($mitra->id);
    	return view('notifikasi.index',compact('lol','telatBayar','editan','sedangKirim'));
    }
    public function notifPetani()
    {
        $userID = Auth::user()->id;
        $petaniID = \App\Petani::where('user_id','=',$userID)->first();

      


        $repeat = \App\ProdukStatus::select("*","produk.id as proid")
            ->join('produk','produk.id','=','produk_status.produk_id')
            ->where('petani_id','=',$petaniID->id)
            ->whereIn('produk.id', function($query){
                $query->select('produk_id')->from('produk_status');
            })
            ->get();
        $repeatEdit = \App\ProdukStatus::select("*","produk.id as proid")
            ->join('produk','produk.id','=','produk_status.produk_id')
            ->where('produk_status.keterangan','like','%'.'Foto'.'%')
            ->where('petani_id','=',$petaniID->id)
            ->whereIn('produk.id', function($query){
                $query->select('produk_id')->from('produk_status');
            })
            ->get();   

        $repeatGj = \App\ProdukStatus::select("*","produk.id as proid")
            ->join('produk','produk.id','=','produk_status.produk_id')
            ->where('produk_status.keterangan','like','%'.'kurang jelas'.'%')
            ->where('petani_id','=',$petaniID->id)
            ->whereIn('produk.id', function($query){
                $query->select('produk_id')->from('produk_status');
            })
            ->get(); 
                
        $repeatGbayar = \App\ProdukStatus::select("*","produk.id as proid")
            ->join('produk','produk.id','=','produk_status.produk_id')
            ->where('produk_status.keterangan','like','%'.'Harga'.'%')
            ->where('petani_id','=',$petaniID->id)
            ->whereIn('produk.id', function($query){
                $query->select('produk_id')->from('produk_status');
            })
            ->get();      


        return view('notifikasi.petani', compact('repeat','repeatGbayar','repeatEdit','repeatGj'));
    }
}
