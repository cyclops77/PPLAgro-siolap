<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembelianUnverified extends Model
{
    protected $table = 'pembelian_unverifed';
    protected $fillable = ['id','pembelian_id','keterangan'];

    public function pembayaran()
      {
      	return $this->hasOne('App\Pembayaran');
      }  
}
