<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = ['username','password','nik','nama','alias','tempat_lahir','tanggal_lahir',
    						'alamat','kecamatan', 'kota_id','kodepos','no_telp1','no_telp2','email','pendidikan',
    						'tanggal_masuk','divisi_id','posisi','role_id'];
	public $timestamps = false;

	public function suratkeluar(){
		return $this->hasMany('App\Suratkeluar');
	}

	public function kota(){
		return $this->hasMany('App\Kota');
	}

	public function divisi(){
		return $this->belongsTo('App\Divisi');
	}

	public function disposisi(){
		return $this->hasMany('App\Disposisi');
	}
	public function role(){
		return $this->belongsTo('App\Role');
	}

	public function notifikasi(){
		return $this->belongsToMany('App\Notifikasi');
	}
}
