<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
    	$userID = Auth::user()->id;
        $mitraID = \App\Outlet::where('user_id','=',$userID)->first();
    	$pembayaran = \App\Pembayaran::select('*')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('mitra_id','=',$mitraID->id)
    		->get();
    	return view('pembayaran.index', compact('pembayaran'));
    }
    public function GakLunas()
    {

        $userID = Auth::user()->id;
        $mitraID = \App\Outlet::where('user_id','=',$userID)->first();
		$check = \App\Pembayaran::select('*')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('mitra_id','=',$mitraID->id)
    		->where('status_bayar','=','Belum Bayar')
    		->first();

    	if (empty($check)) {
    		$isEmpty = "yes";
    	}else{
		$isEmpty = "no";
    	$pembayaran = \App\Pembayaran::select('*')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('mitra_id','=',$mitraID->id)
    		->where('status_bayar','=','Belum Bayar')
    		->get();
    	}
    	return view('pembayaran.statusbayar', compact('pembayaran','isEmpty'));
    }
    public function LinkUploadBukti($id)
    {
    	$barang = \App\Pembayaran::select('*')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('id_pembelian','=',$id)
    		->first();
    	return view('pembayaran.detail',compact('barang'));
    }
    public function UploadBukti(Request $req)
    {
    	$tempatfile = ('bukti_tf');

        $thisBarang = \App\Pembayaran::where('id_pembelian','=',$req->id_pembelian)->first();

        if (!empty($req->file('gambar'))) {
            $gbr = $req->file('gambar');
            $nama_Gbr = $gbr->getClientOriginalName();
            $gbr->move($tempatfile, $nama_Gbr);
        }else{
            $nama_Gbr = $thisBarang->bukti_tf;
        }
        \App\Pembayaran::where('id_pembelian','=',$req->id_pembelian)
        	->update([
        		'bukti_tf' => $nama_Gbr,
        	]);
    	return redirect('/pembayaran');
    }
    public function LinkAcc()
    {
        $bayar = \App\Pembayaran::whereNotNull('bukti_tf')
            ->where('status_bayar','=','Belum Bayar')
            ->get();
        return view('pembayaran.verif',compact('bayar'));
    }
    public function AccUploadBukti(Request $req)
    {
        $pp = \App\Pembayaran::where('id_pembelian','=',$req->id_pembelian)->first();

        $AAproduk = \App\Produk::where('id','=',$pp->produk_id)->first();

        $stok = ($AAproduk->stock) - ($req->jumlah);

        $produk = \App\Produk::where('id','=',$pp->produk_id)
            ->update([
                'stock' => $stok,
            ]);



        \App\Pembayaran::where('id_pembelian','=',$req->id_pembelian)
            ->update([
                'status_bayar' => 'Sudah Bayar',
            ]);
        return redirect('/verif-transaksi');    
    }
}
