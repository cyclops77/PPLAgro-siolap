<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $fillable = ['id','petani_id','nama_barang','jenis_komoditas','gambar','isverify','harga_barang','stock']; 

    public function getAvatar()
      {
         if (!$this->gambar) {
            return asset('product_image/default.png');
         }
         return asset('product_image/'.$this->gambar);
      }
    public function getStatus()
      {
      	if ($this->isverify=="no") {
      		return "Belum Terverifikasi";
      	}else if ($this->isverify=="repeat") {
          return "Belum Terverifikasi";
        }return "Terverifikasi";
      }  
      public function petani()
      {
          return $this->belongsTo('App\Petani');
      }
}