<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Instansi;
use Illuminate\Http\Response;
use File;
use App\Suratmasuk;
use App\Suratkeluar;
use App\Disposisi;
use Carbon\Carbon;
use DB;
use Session;
use App\Tag;
use App\Events\SuratMasukReceive;
use App\Divisi;


class SuratmasukController extends Controller
{
    public function inputsuratmasuk(){
    	$data['instansi'] = Instansi::all();
        $data['tag'] = Tag::all();
        $data['divisis'] = Divisi::all();
    	return view('bagianumum.suratmasuk.inputsuratmasuk', $data);
    }
    public function lihatsuratmasuk(){
    	$data['suratmasuk'] = Suratmasuk::doesntHave('suratkeluar')->get();
     	return view('bagianumum.suratmasuk.lihatsuratmasuk', $data);
    }
    public function input_surat_masuk(Request $req){
    	$data 		= $req->all();
    	$file 		= $req->file('file');
        $tags        = $data['tag'];
    	$extension 	= $file->getClientOriginalExtension();
        $tgl        = Carbon::now()->format('dmY');
    	Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
    	$suratmasuk = new Suratmasuk();
    	$suratmasuk->karyawan_id 		= Session::get('username')->id;
    	$suratmasuk->instansi_id 		= $data['instansi_id'];
    	$suratmasuk->no_surat 			= $data['no_surat'];
    	$suratmasuk->tgl_surat 			= date("Y-m-d", strtotime($data['tgl_surat']));
    	$suratmasuk->tgl_terima 		= date("Y-m-d", strtotime($data['tgl_terima']));
    	$suratmasuk->perihal 			= $data['perihal'];
    	$suratmasuk->isi_ringkas 		= $data['isi_ringkas'];
    	$suratmasuk->prioritas 		    = $data['prioritas'];
    	$suratmasuk->jenis_pengiriman 	= $data['jenis_pengiriman'];
    	$suratmasuk->file				= $data['file'];
    	$suratmasuk->mime 				= $file->getClientMimeType();
    	$suratmasuk->original_filename 	= $file->getClientOriginalName();
    	$suratmasuk->filename 			= $file->getFilename().'.'.$extension;
    	$suratmasuk->save();
        $suratmasuk->no_agenda          = "01".$tgl.$suratmasuk->id;
        $suratmasuk->divisi_id          = $data['divisi_id'];
        $suratmasuk->save();
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
        $suratmasuk->tag()->sync($tagmasuk);
        //naah kalau mau bikin notif apapun itu, tinggal disini deh
        event(new SuratMasukReceive('Surat Masuk'));
    	return redirect('/lihatsuratmasuk')->with(['alert' => 'Input success']);	
    }
    public function show_suratmasuk($filename){
        $suratmasuk = Suratmasuk::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($suratmasuk->filename);
        return (new Response($file, 350))->header('Content-Type', $suratmasuk->mime);
    }
    public function changeSuratMasuk(Request $req){
        $data = $req->all();
        $hasil = Suratmasuk::with('instansi')->where(['instansi_id' => $data['id']])->doesntHave('suratkeluar')->get();
        return $hasil;
    }
    public function deleteSuratMasuk($id){
        $surat = Suratmasuk::find($id);
        $surat->disposisi()->delete();
        $surat->delete();
        return back();
    }
    public function ubahsuratmasuk($id){
        $data['suratmasuk']             = Suratmasuk::find($id);
        $data['suratmasuk']->tgl_surat  = date("m/d/Y", strtotime($data['suratmasuk']->tgl_surat));
        $data['suratmasuk']->tgl_terima = date("m/d/Y", strtotime($data['suratmasuk']->tgl_terima));
        $data['instansi']               = Instansi::all();
        return view('bagianumum.suratmasuk.ubahsuratmasuk', $data);
    }
    public function ubah_suratmasuk(Request $req){
        $data = $req->all();
        $suratmasuk = Suratmasuk::find($data['id']);
        $suratmasuk->karyawan_id        = Session::get('username')->id;
        $suratmasuk->instansi_id        = $data['instansi_id'];
        $suratmasuk->no_agenda          = $data['no_agenda'];
        $suratmasuk->no_surat           = $data['no_surat'];
        $suratmasuk->tgl_surat          = date("Y-m-d", strtotime($data['tgl_surat']));
        $suratmasuk->tgl_terima         = date("Y-m-d", strtotime($data['tgl_terima']));
        $suratmasuk->perihal            = $data['perihal'];
        $suratmasuk->isi_ringkas        = $data['isi_ringkas'];
        $suratmasuk->prioritas          = $data['prioritas'];
        $suratmasuk->jenis_pengiriman   = $data['jenis_pengiriman'];
        if ($data['ubahfile'] == "ya"){
            $file       = $req->file('file');
            $extension  = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
            $suratmasuk->file               = $data['file'];
            $suratmasuk->mime               = $file->getClientMimeType();
            $suratmasuk->original_filename  = $file->getClientOriginalName();
            $suratmasuk->filename           = $file->getFilename().'.'.$extension;
        }
        $suratmasuk->save();
        return back();  
    }
    public function laporansurat_bagianumum($bfr = null,$aft = null){
        $bfr = (empty($bfr))?Carbon::now()->format('Y-m-d'):$bfr;
        $aft = (empty($aft))?Carbon::now()->format('Y-m-d'):$aft;
        $data['before'] = $bfr;
        $data['after'] = $aft;
        $data['suratmasuk'] = Suratmasuk::select(['instansi_id', DB::raw('COUNT(instansi_id) as jml')])
                                ->whereBetween('tgl_terima', [$bfr, $aft])->groupBy(['instansi_id'])->get();
        $data['suratkeluar'] = Suratkeluar::select(['instansi_id', DB::raw('COUNT(instansi_id) as jum')])
                                ->whereBetween('tgl_surat', [$bfr, $aft])->groupBy(['instansi_id'])->get();
                                return view('bagianumum.pelaporan.laporansuratmasuk', $data);
    }
    public function detailsuratmasuk_bagianumum($bfr,$aft,$id){
        $data['suratmasuk'] = Suratmasuk::where(['instansi_id'=>$id])->whereBetween('tgl_terima', [$bfr, $aft])->get();
        return view('bagianumum.pelaporan.detailsuratmasuk', $data);  
    }
    public function carisurat($bfr= null, $aft=null, $jenis=null, $tag=0){
        $data['tags'] = Tag::all();
        $bfr = (empty($bfr))?Carbon::now()->format('Y-m-d'):$bfr;
        $aft = (empty($aft))?Carbon::now()->format('Y-m-d'):$aft;
        $data['before'] = $bfr;
        $data['after'] = $aft;
        $data['idtag']  = $tag;
        $data['surats'] = array();
        if($jenis == "suratmasuk"){
            $data['surats'] = Tag::find($tag)->suratmasuk()->whereBetween('tgl_terima', [$bfr, $aft])->get();
        }else if($jenis == "suratkeluar"){
            $data['surats'] = Tag::find($tag)->suratkeluar()->whereBetween('tgl_catat', [$bfr, $aft])->get();
        }
        return view('manajer.carisurat', $data);
    }
}
