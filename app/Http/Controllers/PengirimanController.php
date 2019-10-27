<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    public function index()
    {
    	$BayarAja = \App\Pembayaran::select('*')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('status_bayar','=','Sudah Bayar')
    		->where('status_terima','=','Belum Terima')
    		->where('status_terkirim','=','Belum Terkirim')
    		->get();


    	return view('kirim.index', compact('BayarAja','sudahTerima'));	
    }
    public function riwayat($value='')
    {
		$sudahTerima = \App\Pembayaran::where('status_terima','=','Sudah Terima')
    		->get();	

    	return view('kirim.riwayat', compact('sudahTerima'));
    }
    public function kirimBarang(Request $req)
    {
        \App\Pembayaran::where('id_pembelian','=',$req->idPesanan)
            ->update([
                'status_terkirim' => 'Sedang Mengirim',
            ]);
        return redirect()->back();        
    }
    public function sedangkirim()
    {
        $sedangKirim = \App\Pembayaran::select('*')
            ->join('produk','produk.id','=','pembelian.produk_id')
            ->where('status_terkirim','=','Sedang Mengirim')
            ->get();


        return view('kirim.sedangkirim', compact('sedangKirim'));
    }
    public function sedangDiKirim()
    {
        $userID = Auth::user()->id;
        $mitraID = \App\Outlet::where('user_id','=',$userID)->first();
        $check = \App\Pembayaran::select('*')
            ->join('produk','produk.id','=','pembelian.produk_id')
            ->where('status_terkirim','=','Sedang Mengirim')
            ->where('mitra_id','=',$mitraID->id)
            ->first();

        if (empty($check)) {
            $isEmpty = "yes";
        }else{
        $isEmpty = "no";

        $sedangKirim = \App\Pembayaran::select('*')
            ->join('produk','produk.id','=','pembelian.produk_id')
            ->where('status_terkirim','=','Sedang Mengirim')
            ->where('mitra_id','=',$mitraID->id)
            ->get();

    }
        return view('kirim.kirimSaya', compact('sedangKirim','isEmpty'));
    }
    public function barangSampe(Request $req)
    {
        \App\Pembayaran::where('id_pembelian','=', $req->idPesanan)
            ->update([
               'status_terkirim' => 'Terkirim',
               'status_terima' => 'Diterima',     
            ]);
        return redirect()->back();
    }
}
