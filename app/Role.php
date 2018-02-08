<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['name'];
	public $timestamps = false;

	public function karyawan(){
		return $this->hasMany('App\Karyawan');
	}
	public function user(){
		return $this->hasMany('App\User');
	}
	public function menu()
    {
        return $this->belongsToMany('App\Menu');
    }
}