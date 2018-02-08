<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $fillable = ['nama'];
	public $timestamps = false;

	public function karyawan(){
		return $this->belongsTo('App\Karyawan');
	}
}
