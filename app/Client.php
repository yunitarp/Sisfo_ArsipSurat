<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['jenis_client'];
	public $timestamps = false;

	public function instansi(){
		return $this->belongsTo('App\Instansi');
	}
}
