<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
	 protected $table = 'petani';
	 protected $fillable = ['id','user_id','name'];

	 public function produk()
	 {
	 	return $this->hasMany('App\Produk');
	 }

	 public function user()
	 {
	 	return $this->belongsTo('App\User');
	 }
}