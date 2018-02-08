<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;

class DivisiController extends Controller
{
    public function lihatdivisi(){
    	$divisi['divisi'] = Divisi::all();
    	return view('admin.divisi.lihatdivisi', $divisi);
    }
    public function input_divisi(Request $req){
    	$data = $req->all();
    	$client = Divisi::create($data);
    	return redirect('/lihatdivisi')->with('pesan','Divisi Baru Berhasil Diinputkan');
    }
}
