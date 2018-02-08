<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposisi extends Model
{
    protected $fillable = ['suratmasuk_id', 'isi_disposisi', 'disposisi_manajer', 'sifat','perihal','karyawan_id','batas_waktu','catatan', 'divisi_id'];
	public $timestamps = false;

	public function suratmasuk(){
		return $this->belongsTo('App\Suratmasuk');
	}
	public function karyawan(){
		return $this->belongsTo('App\Karyawan');
	}
}
