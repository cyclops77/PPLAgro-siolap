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

        $now = date('Y-m-d H:i:s');    
        $userID = Auth::user()->id;
        $mitraID = \App\Outlet::where('user_id','=',$userID)->first();
		$check = \App\Pembayaran::select('*')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('mitra_id','=',$mitraID->id)
    		->where('status_bayar','=','Belum Bayar')
    		->first();

    	if (empty($check)) {
    		$isEmpty = "yes";
            $pembayaranWajib='';
            $pembayaran='';
            $pembayaranTelat='';
            $pembayaranInvalid='';
            $response['pembayaranWajibC']=0;
            $response['pembayaranC']=0;
            $response['pembayaranTelatC']=0;
            $response['pembayaranInvalidC']=0;

    	}else{
		$isEmpty = "no";
    	$pembayaran = \App\Pembayaran::select('*')
    		->join('produk','produk.id','=','pembelian.produk_id')
    		->where('mitra_id','=',$mitraID->id)
    		->where('status_bayar','=','Belum Bayar')
    		->get();

        $pembayaranWajib = \App\Pembayaran::select('*')
            ->join('produk','produk.id','=','pembelian.produk_id')
            ->where('mitra_id','=',$mitraID->id)
            ->where('status_bayar','=','Belum Bayar')
            ->where('terakhir', '>', $now)
            ->whereNotIn('id_pembelian',function($query) {
              $query->select('pembelian_id')->from('pembelian_unverifed');
            })
            ->get();

        $pembayaranTelat = \App\Pembayaran::select('*')
            ->join('produk','produk.id','=','pembelian.produk_id')
            ->where('mitra_id','=',$mitraID->id)
            ->where('status_bayar','=','Belum Bayar')
            ->where('terakhir', '<', $now)
            ->get(); 

        $pembayaranInvalid = \App\PembelianUnverified::select('*')
            ->join('pembelian','pembelian.id_pembelian','=','pembelian_unverifed.pembelian_id')
            ->join('produk','produk.id','=','pembelian.produk_id')
            ->get();            
               
        $response['pembayaranWajibC']=$pembayaranWajib->count();
        $response['pembayaranC']=$pembayaran->count();
        $response['pembayaranTelatC']=$pembayaranTelat->count();
        $response['pembayaranInvalidC']=$pembayaranInvalid->count();
    	}
        // dd($pembayaranWajib);
    	return view('pembayaran.statusbayar', compact('pembayaran','isEmpty','pembayaranWajib','pembayaranTelat','pembayaranInvalid','response'));
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
            ->whereNotIn('id_pembelian',function($query) {
              $query->select('pembelian_id')->from('pembelian_unverifed');
            })
            ->get();
        return view('pembayaran.verif',compact('bayar'));
    }
    public function AccUploadBukti(Request $req)
    {
        $pp = \App\Pembayaran::where('id_pembelian','=',$req->id_pembelian)->first();

        $AAproduk = \App\Produk::where('id','=',$pp->produk_id)->first();

        $stok = ($AAproduk->stock) - ($req->jumlah);

        \App\Pembayaran::where('id_pembelian','=',$req->id_pembelian)
            ->update([
                'status_bayar' => 'Sudah Bayar',
            ]);
        return redirect()->back()->with('sukses','Anda berhasil menolak transaksi');    
    }
    public function DecUploadBukti(Request $req)
    {
        if (empty($req->keterangan)) {
            return redirect()->back()->with('gagal','Anda harus memilih alasan');
        }else{
        $Pembelian = \App\Pembayaran::where('id_pembelian','=',$req->id_pembelian)
            ->first();
        $thisBarang = \App\Produk::where('id','=',$Pembelian->produk_id)
            ->first();

        $kembali = $Pembelian->jumlah + $thisBarang->stock;

        \App\Produk::where('id','=',$Pembelian->produk_id)
            ->update([
                'stock' => $kembali,
            ]);
        $un = new \App\PembelianUnverified;
        $un->id = mt_rand(100000,999999);
        $un->pembelian_id = $req->id_pembelian;
        $un->keterangan = $req->keterangan;
        $un->save();

        return redirect()->back()->with('sukses','Anda berhasil menolak transaksi');
    }
    }
    public function routeDisAcc($id)
    {
        $pembelian = \App\Produk::select('*','produk.id as proid')
            ->join('petani','petani.id','=','produk.petani_id')
            ->where('produk.id','=',$id)
            ->first();
        return view('verify.detail',compact('pembelian'));
    }
}
