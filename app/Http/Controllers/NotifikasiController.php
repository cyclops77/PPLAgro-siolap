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

	    // dd($mitra->id);
    	return view('notifikasi.index',compact('lol','telatBayar','editan'));
    }
}
