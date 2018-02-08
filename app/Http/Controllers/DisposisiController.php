<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Divisi;
Use App\Karyawan;
use App\Disposisi;
use App\Suratmasuk;
use Session;
use Carbon\Carbon;

class DisposisiController extends Controller
{
    public function inputdisposisi($id){
        $data['suratmasuk']     = Suratmasuk::find($id);
    	$data['divisi']         = Divisi::all();
    	$data['karyawan']       = Karyawan::all();
    	return view('direktur.disposisi.inputdisposisibaru', $data);
    }
    public function input_disposisi(Request $req){
    	$data = $req->all();
    	$data['batas_waktu'] = date("Y-m-d", strtotime($data['batas_waktu']));
    	$disposisi = Disposisi::create($data);
    	return back();
    }
    public function lihatdisposisi_karyawan(){
        $data['disposisi'] = Disposisi::where(['divisi_id'=>Session::get('username')->divisi_id,
                            'karyawan_id'=>Session::get('username')->id,'status'=>'Dalam Proses'])->get();
        return view('karyawan.lihatdisposisi', $data);
    }
    public function lihatdisposisi_direktur($bfr = null,$aft = null, $divisi=null){
        $data['divisis']    = Divisi::all();
        $bfr                = (empty($bfr))?Carbon::now()->format('Y-m-d'):$bfr;
        $aft                = (empty($aft))?Carbon::now()->format('Y-m-d'):$aft;
        $data['before']     = $bfr;
        $data['after']      = $aft;
        $data['iddiv']      = $divisi;
        $data['disposisis']  = Disposisi::where(['divisi_id'=>$divisi])
                                ->whereBetween('batas_waktu', [$bfr, $aft])->get();
        return view('direktur.disposisi.lihatdisposisi', $data);
    }
    public function tindaklanjutisurat(){
        $data['suratmasuk'] = Suratmasuk::all();
        return view('direktur.suratmasuk.tindaklanjutsuratmasuk', $data);
    }
    public function ubahdisposisi($id){
        $data['disposisi'] = Disposisi::find($id);
        $data['disposisi']->batas_waktu  = date("m/d/Y", strtotime($data['disposisi']->batas_waktu));
        $data['divisi'] = Divisi::all();
        $data['karyawan'] = Karyawan::all();
        return view('direktur.disposisi.ubahdisposisi', $data);
    }
    public function ubah_disposisi(Request $req){
        $data = $req->all();
        $disposisi = Disposisi::find($data['id']);
        $disposisi->divisi_id = $data['divisi_id'];
        $disposisi->kepada = $data['kepada'];
        $disposisi->batas_waktu = date("Y-m-d", strtotime($data['batas_waktu']));
        $disposisi->karyawan_dituju = $data['karyawan_dituju'];
        $disposisi->status = $data['status'];
        $disposisi->save();
        return back();
    }

    public function cetakdisposisi($id){
        $data['disposisi'] = Disposisi::find($id);
        return view('direktur.disposisi.cetakdisposisi', $data);
    }
}
