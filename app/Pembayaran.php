<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembelian';
    protected $fillable = ['id_pembelian','mitra_id','produk_id','jumlah','harga_total','bukti_tf','status_bayar','status_terkirim','status_terima'];

    public function getAvatar()
      {
         if (!$this->gambar) {
            return asset('bukti_tf/default.png');
         }
         return asset('bukti_tf/'.$this->gambar);
      }
}
