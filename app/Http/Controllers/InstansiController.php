<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instansi;
use App\Kota;
use App\Provinsi;
use App\Client;

class InstansiController extends Controller
{
    public function lihatinstansi(){
    	$instansi['instansi'] = Instansi::all();
    	return view('admin.instansi.lihatinstansi', $instansi);
    }
    public function input_instansi(Request $req){
    	$data = $req->all();
    	$instansi = Instansi::create($data);
    	return back();
    }
    public function ubahinstansi($id){
    	$data['instansi'] = Instansi::find($id);
    	$data['kota'] 	= Kota::all();
    	$data['provinsi'] = Provinsi::all();
    	$data['client'] = Client::all();
    	return view('admin.instansi.ubahinstansi', $data);
    }
}
