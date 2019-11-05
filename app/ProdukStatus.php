<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdukStatus extends Model
{
    protected $table = 'produk_status';
    protected $fillable = ['id','produk_id','kategori','keterangan'];
}
