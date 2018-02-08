<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suratmasuk extends Model
{
    protected $fillable = ['karyawan_id','instansi_id','no_agenda','no_surat','tgl_surat','tgl_terima','perihal','isi_ringkas','prioritas','jenis_pengiriman','file'];
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
	public function disposisi(){
		return $this->hasOne('App\Disposisi');
	}
	public function tag(){
		return $this->belongsToMany('App\Tag');
	}
	public function suratkeluar(){
		return $this->hasOne('App\suratkeluar');
	}
}
