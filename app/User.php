<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    protected $fillable = ['username','password','nama','nip','role_id'];
    public $timestamps = false;

    public function suratmasuk(){
        return $this->hasMany('App\Suratmasuk');
    }
    public function suratkeluar(){
        return $this->hasMany('App\Suratkeluar');
    }
    public function role(){
    	return $this->belongsTo('App\Role');
    }
}
