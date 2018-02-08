<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Karyawan;
use Carbon\Carbon;
use DB;
use App\Suratmasuk;
use App\Suratkeluar;
use App\Kota;
use App\Provinsi;
use App\Role;
use App\Divisi;

class KaryawanController extends Controller
{
    public function index(){
    	return view('bagianumum.dashboard.index');
    }
    public function input_karyawan(Request $req){
    	$data = $req->all();
    	$data['tanggal_lahir'] = date("Y-m-d", strtotime($data['tanggal_lahir']));
    	$data['tanggal_masuk'] = date("Y-m-d", strtotime($data['tanggal_masuk']));
        $data['password'] = md5($data['password']);
    	$karyawan = Karyawan::create($data);
    	return back();
    }
    public function ubahkaryawan($id){
        $data['karyawan']   = Karyawan::find($id);
        $data['karyawan']->tanggal_lahir = date("m/d/Y", strtotime($data['karyawan']->tanggal_lahir));
        $data['karyawan']->tanggal_masuk = date("m/d/Y", strtotime($data['karyawan']->tanggal_masuk ));
        $data['kota']       = Kota::all();
        $data['provinsi']   = Provinsi::all();
        $data['role']       = Role::all();
        $data['divisi']     = Divisi::all();
        return view('admin.karyawan.ubahkaryawan', $data);
    }
    public function ubah_karyawan(Request $req){
        $data                       = $req->all();
        $karyawan                   = Karyawan::find($data['id']);
        $karyawan->password         = md5($data['password']);
        $karyawan->nik              = $data['nik'];
        $karyawan->nama             = $data['nama'];
        $karyawan->alias            = $data['alias'];
        $karyawan->tempat_lahir     = $data['tempat_lahir'];
        $karyawan->tanggal_lahir    = date("Y-m-d", strtotime($data['tanggal_lahir']));
        $karyawan->alamat           = $data['alamat'];
        $karyawan->kecamatan        = $data['kecamatan'];
        $karyawan->kota_id          = $data['kota_id'];
        $karyawan->kodepos          = $data['kodepos'];
        $karyawan->no_telp1         = $data['no_telp1'];
        $karyawan->no_telp2         = $data['no_telp2'];
        $karyawan->email            = $data['email'];
        $karyawan->pendidikan       = $data['pendidikan'];
        $karyawan->tanggal_masuk    = date("Y-m-d", strtotime($data['tanggal_masuk']));
        $karyawan->divisi_id        = $data['divisi_id'];
        $karyawan->posisi           = $data['posisi'];
        $karyawan->role_id          = $data['role_id'];
        $karyawan->save();
        return back();
    }
    public function delete_karyawan($id){
        Karyawan::find($id)->delete();
        return back();
    }
    public function index_direktur(){
        return view('direktur.dashboard.index');
    }
    public function lihatsuratmasuk($bfr = null,$aft = null){
        $bfr = (empty($bfr))?Carbon::now()->format('Y-m-d'):$bfr;
        $aft = (empty($aft))?Carbon::now()->format('Y-m-d'):$aft;
        $data['before'] = $bfr;
        $data['after'] = $aft;
        $data['suratmasuk'] = Suratmasuk::select(['instansi_id', DB::raw('COUNT(instansi_id) as jml')])
                                ->whereBetween('tgl_terima', [$bfr, $aft])->groupBy(['instansi_id'])->get();
        $data['suratkeluar'] = Suratkeluar::select(['instansi_id', DB::raw('COUNT(instansi_id) as jum')])
                                ->whereBetween('tgl_surat', [$bfr, $aft])->groupBy(['instansi_id'])->get();
        return view('direktur.suratmasuk.lihatsuratmasuk', $data);
    }
    public function detailsuratmasuk($bfr,$aft,$id){
        $data['suratmasuk'] = Suratmasuk::where(['instansi_id'=>$id])->whereBetween('tgl_terima', [$bfr, $aft])->get();
        return view('direktur.suratmasuk.detailsuratmasuk', $data);
    }
    public function detailsuratkeluar($bfr,$aft,$id){
        $data['suratkeluar'] = Suratkeluar::where(['instansi_id'=>$id])->whereBetween('tgl_surat', [$bfr, $aft])->get();
        return view('direktur.suratmasuk.detailsuratkeluar', $data);
    }
}