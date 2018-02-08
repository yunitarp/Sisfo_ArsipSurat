<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nama_tag'];
	public $timestamps = false;

	public function suratmasuk(){
		return $this->belongsToMany('App\Suratmasuk');
	}
	public function suratkeluar(){
		return $this->belongsToMany('App\Suratkeluar');
	}

}
