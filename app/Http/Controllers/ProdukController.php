<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $userID = Auth::user()->id;
        $petaniID = \App\Petani::where('user_id','=',$userID)->first();

        $semua = \App\Produk::where('petani_id','=',$petaniID->id)->get();

        $padi = \App\Produk::where('petani_id','=',$petaniID->id)
            ->where('jenis_komoditas','=','padi')
            ->get();
        
        $tebu = \App\Produk::where('petani_id','=',$petaniID->id)
            ->where('jenis_komoditas','=','tebu')
            ->get();            
        
        $tembakau = \App\Produk::where('petani_id','=',$petaniID->id)
            ->where('jenis_komoditas','=','tembakau')
            ->get();

        $kedelai = \App\Produk::where('petani_id','=',$petaniID->id)
            ->where('jenis_komoditas','=','kedela')
            ->get();  


		return view('product.index', compact('semua','tebu','tembakau','kedelai','padi'));
    }
    public function create()
    {
    	return view('product.create');
    }
    public function insert(Request $req)
    {
        $userID = Auth::user()->id;
        $petaniID = \App\Petani::where('user_id','=',$userID)->first();

        $tempatfile = ('product_image');

        $gbr = $req->file('gambar');
        $nama_Gbr = $gbr->getClientOriginalName();
        $gbr->move($tempatfile, $nama_Gbr);

        $p = new \App\Produk;
        $p->id = mt_rand(1000,9999);
        $p->petani_id = $petaniID->id;
        $p->nama_barang = $req->nama;
        $p->jenis_komoditas = $req->jenis_komoditas;
        $p->gambar = $nama_Gbr;
        $p->harga_barang = $req->harga;
        $p->stock = $req->stock;
        $p->isverify = 'no';

        $p->save();

        // dd($userID);

    	return redirect('/produk');	
    }
    public function edit($id)
    {

        $produk = \App\Produk::where('id','=',$id)->first();
        return view('product.edit', compact('produk'));
    }
    public function update(Request $req)
    {
        $tempatfile = ('product_image');

        $thisBarang = \App\Produk::where('id','=',$req->barangID)->first();

        if (!empty($req->file('gambar'))) {
            $gbr = $req->file('gambar');
            $nama_Gbr = $gbr->getClientOriginalName();
            $gbr->move($tempatfile, $nama_Gbr);
        }else{
            $nama_Gbr = $thisBarang->gambar;
        }

        if ($req->barangID == $thisBarang->id) {
            \App\Produk::where('id','=',$req->barangID)
                ->update([
                   'nama_barang' => $req->nama,
                   'jenis_komoditas' => $req->jenis_komoditas,
                   'harga_barang' => $req->harga,
                   'stock' => $req->stock,
                   'gambar' => $nama_Gbr,
                ]);
            return redirect('/produk');    
        }else{
            return redirect()->back();
        }
    }
}
