<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Instansi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use File;
use App\Suratkeluar;
use App\Suratmasuk;
use App\Tag;
use Session;

class SuratkeluarController extends Controller
{
    public function inputsuratkeluar(){
    	$data['instansi'] = Instansi::all();
        $data['tag'] = Tag::all();
    	return view('bagianumum.suratkeluar.inputsuratkeluar', $data);
    }
    public function lihatsuratkeluar(){
    	$suratkeluar['suratkeluar'] = Suratkeluar::all();
    	return view('bagianumum.suratkeluar.lihatsuratkeluar', $suratkeluar);
    }
    public function input_surat_keluar(Request $req){
    	$data 		= $req->all();
    	$file 		= $req->file('file');
        $tags       = $data['tag'];
    	$extension 	= $file->getClientOriginalExtension();
    	Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
    	$suratkeluar = new Suratkeluar();
    	$suratkeluar->karyawan_id 		= Session::get('username')->id;
    	$suratkeluar->instansi_id 		= $data['instansi_id'];
    	$suratkeluar->jenis_surat 		= $data['jenis_surat'];
        if($data['jenis_surat'] == "balasan"){
            $suratkeluar->suratmasuk_id     = $data['suratmasuk_id'];
        }
    	else{
            $suratkeluar->suratmasuk_id     = "";
        }
    	$suratkeluar->no_surat			= $data['no_surat'];
    	$suratkeluar->tgl_surat 		= date("Y-m-d", strtotime($data['tgl_surat']));
    	$suratkeluar->tgl_catat 		= date("Y-m-d", strtotime($data['tgl_catat']));
    	$suratkeluar->isi_ringkas 		= $data['isi_ringkas'];
    	$suratkeluar->prioritas 		= $data['prioritas'];
        $suratkeluar->perihal           = $data['perihal'];
    	$suratkeluar->jenis_pengiriman 	= $data['jenis_pengiriman'];
    	$suratkeluar->file				= $data['file'];
    	$suratkeluar->mime 				= $file->getClientMimeType();
    	$suratkeluar->original_filename 	= $file->getClientOriginalName();
    	$suratkeluar->filename 			= $file->getFilename().'.'.$extension;
    	$suratkeluar->save();
        $tagmasuk = array();
        foreach ($tags as $tag) {
            $tagwow = Tag::where('nama_tag','=',$tag)->get();
            if(count($tagwow) == 0){
                $tagwow = new Tag();
                $tagwow->nama_tag = $tag;
                $tagwow->save();
                $tagmasuk[] = $tagwow->id;
            }else{
                $tagmasuk[] = $tagwow[0]->id;
            }
        }
        $suratkeluar->tag()->sync($tagmasuk);
        return redirect('/lihatsuratkeluar')->with(['alert' => 'Input success']);
    }
    public function show_suratkeluar($filename){
        $suratkeluar = Suratkeluar::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($suratkeluar->filename);
        return (new Response($file, 350))->header('Content-Type', $suratkeluar->mime);
    }
    public function deleteSuratKeluar($id){
        $surat = Suratkeluar::find($id);
        $surat->tag()->detach();
        $surat->delete();
        return redirect('/lihatsuratkeluar')->with('pesan','Data berhasil dihapus!');
    }
    public function detailsuratkeluar_bagianumum($bfr,$aft,$id){
        $data['suratkeluar'] = Suratkeluar::where(['instansi_id'=>$id])->whereBetween('tgl_surat', [$bfr, $aft])->get();
        return view('direktur.suratmasuk.detailsuratkeluar', $data);
    }
}
