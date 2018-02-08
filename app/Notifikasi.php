<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $fillable = ['isi_notifikasi','tanggal'];
    public $timestamps = false;

    public function karyawan(){
    	return $this->belongsToMany('App\Karyawan');
    }
}
