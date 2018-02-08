<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratkeluar extends Model
{
    protected $fillable = ['karyawan_id','instansi_id','jenis_surat','suratmasuk_id','no_surat','tgl_surat','tgl_catat',
    						'isi_ringkas','prioritas','jenis_pengiriman','file'];
	public $timestamps = false;

	public function instansi(){
		return $this->belongsTo('App\Instansi');
	}

	public function karyawan(){
		return $this->belongsTo('App\Karyawan');
	}

	public function user(){
		return $this->belongsTo('App\User');
	}
	public function tag(){
		return $this->belongsToMany('App\Tag');
	}
	public function suratmasuk(){
		return $this->belongsTo('App\suratmasuk');
	}
}
