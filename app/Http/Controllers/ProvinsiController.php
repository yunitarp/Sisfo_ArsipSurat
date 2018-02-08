<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provinsi;

class ProvinsiController extends Controller
{
    public function lihatprovinsi(){
    	$provinsi['provinsi'] = Provinsi::all();
    	return view('admin.provinsi.lihatprovinsi', $provinsi);
    }
    public function input_provinsi(Request $req){
    	$data = $req->all();
    	$provinsi = Provinsi::create($data);
    	return back();
    }
}
