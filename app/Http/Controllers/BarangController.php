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

         $jagung = \App\Produk::where('isverify','=','yes')
            ->where('jenis_komoditas','=','jagung')
            ->get();
        
        $tebu = \App\Produk::where('isverify','=','yes')
            ->where('jenis_komoditas','=','tebu')
            ->get();            
        
        $tembakau = \App\Produk::where('isverify','=','yes')
            ->where('jenis_komoditas','=','tembakau')
            ->get();

        $kedelai = \App\Produk::where('isverify','=','yes')
            ->where('jenis_komoditas','=','kedela')
            ->get(); 

    	return view('barang.index', compact('semua','tebu','tembakau','kedelai','padi','jagung'));
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

        $hasilKurang = $brg->stock - $req->total;
        \App\Produk::where('id','=',$req->produk_id)
            ->update([
                'stock' => $hasilKurang,
            ]);

        $user = Auth::user();
        $mitraID = \App\Outlet::where('user_id','=',$user->id)->first();
        $tgl = date('Y-m-d H:i:s');

        $b = new \App\Pembayaran;
        $b->id_pembelian = mt_rand(100000,999999);
        $b->mitra_id = $mitraID->id;
        $b->produk_id = $req->produk_id;
        $b->jumlah = $req->total;
        $b->harga_total = $harga_total;   
        $b->status_bayar = 'Belum Bayar';   
        $b->status_terkirim = 'Belum Terkirim';   
        $b->status_terima = 'Belum Terima';
        $b->terakhir = date('Y-m-d H:i:s', strtotime('next day'));
        $b->save();   

        return redirect('/pembayaran');
    }
    public function refresh()
    {
        $now = date('Y-m-d H:i:s');    

        $check = \App\Pembayaran::select('*')
            ->join('produk','produk.id','=','pembelian.produk_id')
            ->where('status_bayar','=','Belum Bayar')
            ->where('terakhir', '<', $now)
            ->whereNull('bukti_tf')
            ->whereNotIn('id_pembelian',function($query) {
              $query->select('pembelian_id')->from('pembelian_unverifed');
            })
            ->first();

        if (empty($check)) {
            $isEmpty = "yes";
        }else{
            $isEmpty = "no";
            $pembayaranTelat = \App\Pembayaran::select('*')
            ->join('produk','produk.id','=','pembelian.produk_id')
            ->where('status_bayar','=','Belum Bayar')
            ->where('terakhir', '<', $now)
            ->whereNull('bukti_tf')
            ->whereNotIn('id_pembelian',function($query) {
              $query->select('pembelian_id')->from('pembelian_unverifed');
            })
            ->get();

        }
        return view('verify.refresh',compact('pembayaranTelat','isEmpty'));
    }
    public function refreshNow(Request $req)
    {
        $stockBarang = \App\Pembayaran::where('id_pembelian','=',$req->id_pembelian)
            ->first();
        $thisBarang = \App\Produk::where('id','=',$stockBarang->produk_id)
            ->first();

        $kembali = $stockBarang->jumlah + $thisBarang->stock;
        \App\Produk::where('id','=',$stockBarang->produk_id)
            ->update([
                'stock' => $kembali,
            ]);        

        $un = new \App\PembelianUnverified;
        $un->id = mt_rand(100000,999999);
        $un->pembelian_id = $req->id_pembelian;
        $un->keterangan = 'Tidak Melakukan Transaksi';
        $un->save();    

        return redirect()->back()->with('sukses','Berhasil mengembalikan stock');
    }
}
