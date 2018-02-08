<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;

class KotaController extends Controller
{
    public function lihatkota(){
    	$kota['kota'] = Kota::all();
    	return view('admin.kota.lihatkota', $kota);
    }
    public function input_kota(Request $req){
    	$data = $req->all();
    	$kota = Kota::create($data);
    	return back();
    }
}
