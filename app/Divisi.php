<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $fillable = ['nama'];
	public $timestamps = false;

	public function karyawan(){
		return $this->hasMany('App\Karyawan');
	}
}
