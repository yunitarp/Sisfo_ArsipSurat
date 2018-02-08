<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    protected $fillable = ['nama','alamat','kota_id','provinsi_id','no_telp','fax','email','jenis_id'];
	public $timestamps = false;

	public function client(){
		return $this->hasMany('App\Client');
	}

	public function suratmasuk(){
		return $this->hasMany('App\Suratmasuk');
	}

	public function suratkeluar(){
		return $this->hasMany('App\Suratkeluar');
	}
}
