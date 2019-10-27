<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Petani extends Model
{
	 protected $table = 'petani';
	 protected $fillable = ['id','user_id','name'];
}
