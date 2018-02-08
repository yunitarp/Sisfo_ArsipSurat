<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function lihatclient(){
    	$client['client'] = Client::all();
    	return view('admin.client.lihatclient', $client);
    }
    public function input_client(Request $req){
    	$data = $req->all();
    	$client = Client::create($data);
    	return redirect('/lihatclient')->with('pesan','Client Baru Berhasil Diinputkan');
    }
}
