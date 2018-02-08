<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kota;
use App\Provinsi;
use App\Client;
use App\Divisi;
use App\Karyawan;
use App\Role;
use App\Menu;
use Session;
use App\User;

class AdminController extends Controller
{
    public function login(){
        if(Session::has('role')){
            return redirect('/index');
        }
        return view('login');
    }
    public function doLogin(Request $req){
        $data = $req->all();

        #if($data['role'] == "karyawan"){
        #    $akun = Karyawan::where(['username'=>$data['username'],'password'=>$data['password']])->get();
        #}
        #else{
        #   $akun = User::where(['username'=>$data['username'],'password'=>$data['password']])->get();
        #}
        $akun = Karyawan::where(['username'=>$data['username'],'password'=>md5($data['password'])])->get();
        $tipe = "kar";
        if(count($akun) == 0){
            $akun = User::where(['username'=>$data['username'],'password'=>md5($data['password'])])->get();
            $tipe = "user";
        }
        if (count($akun) == 0){
            return "false";
        }else{
            Session::put(['all_menus' => Menu::tree(),'username'=>$akun[0], 'nama'=>$akun[0]->nama,
                        'role'=>strtolower($akun[0]->role->name), 'menus' => $akun[0]->role->menu->pluck('id')->toArray()]); 
            return "true";
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/');
    }
    public function index(){
        $menu['menu'] = Menu::tree();
    	return view('admin.dashboard.index', $menu);
    }
    public function inputclient(){
    	return view('admin.client.inputclient');
    }
    public function delete_client($id){
        Client::find($id)->delete();
        return back();
    }
    public function ubahclient($id){
        $data['client'] = Client::find($id)->first();
        return view('admin.client.ubahclient', $data);
    }
    public function ubah_client(Request $req){
        $data                 = $req->all();
        $client               = Client::find($data['id']);
        $client->jenis_client = $data['jenis_client'];
        $client->save();
        return back();
    }
    public function inputdivisi(){
    	return view('admin.divisi.inputdivisi');
    }
    public function delete_divisi($id){
        Divisi::find($id)->delete();
        return back();
    }
    public function ubahdivisi($id){
        $data['divisi'] = Divisi::find($id)->first();
        return view('admin.divisi.ubahdivisi', $data);
    }
    public function ubah_divisi(Request $req){
        $data         = $req->all();
        $divisi       = Divisi::find($data['id']);
        $divisi->nama = $data['nama'];
        $divisi->save();
        return back();
    }
    public function inputinstansi(){
        $data['kota'] = Kota::all();
        $data['provinsi'] = Provinsi::all();
        $data['client'] = Client::all();
    	return view('admin.instansi.inputinstansi', $data);
    }
    public function inputkaryawan(){
        $data['kota'] = Kota::all();
        $data['divisi'] = Divisi::all();
        $data['role'] = Role::all();
    	return view('admin.karyawan.inputkaryawan', $data);
    }
    public function inputkota(){
    	return view('admin.kota.inputkota');
    }
    public function delete_kota($id){
        Kota::find($id)->delete();
        return back();
    }
    public function ubahkota($id){
        $data['kota'] = Kota::find($id)->first();
        return view('admin.kota.ubahkota', $data);
    }
    public function ubah_kota(Request $req){
        $data       = $req->all();
        $kota       = Kota::find($data['id']);
        $kota->nama = $data['nama'];
        $kota->save();
        return back();
    }
    public function inputprovinsi(){
    	return view('admin.provinsi.inputprovinsi');
    }
    public function delete_provinsi($id){
        Provinsi::find($id)->delete();
        return back();
    }
    public function ubahprovinsi($id){
        $data['provinsi'] = Provinsi::find($id)->first();
        return view('admin.provinsi.ubahprovinsi', $data);
    }
    public function ubah_provinsi(Request $req){
        $data           = $req->all();
        $provinsi       = Provinsi::find($data['id']);
        $provinsi->nama = $data['nama'];
        $provinsi->save();
        return back();
    }
    public function inputuser(){
        $data['role'] = Role::all();
    	return view('admin.user.inputuser', $data);
    }
    public function lihatkaryawan(){
        $karyawan['karyawan'] = Karyawan::all();
        return view('admin.karyawan.lihatkaryawan', $karyawan);
    }
    public function inputroles(){
        return view('admin.roles.inputroles');
    }
    public function input_roles(Request $req){
        $data = $req->all();
        $role = Role::create($data);
        return back();
    }
    public function usermanagement($roles){
        if($roles == "karyawan"){
            $data['user'] = Karyawan::all();
        }else{
            $data['user'] = User::all();
        }
        return view('adminsystem.usermanagement', $data);
    }
    public function inputmenu(){
        $data['menu'] = Menu::all();
        return view('adminsystem.inputmenu', $data);
    }
    public function input_menu(Request $req){
        $data = $req->all();
        $menu = Menu::create($data);
        return back();
    }
    public function menupermission(){
        $data['role'] = Role::all();
        $data['menu'] = Menu::tree();
        return view('adminsystem.menupermission', $data);
    }
    public function menu_permission(Request $req){
         $data      = $req->all();
         $roles     = Role::find($data['role_id']);
         $menu      = $data['menu_id'];
         $roles->menu()->sync($menu);
         return back();
    }
    public function daftarmenu(){
        $data['menu'] = Menu::all();
        return view('adminsystem.daftarmenu', $data);
    }
    public function ubahmenu($id){
        $data['menu'] = Menu::find($id);
        $data['menus'] = Menu::all();
        return view('adminsystem.ubahmenu', $data);
    }
    public function ubah_menu(Request $req){
        $data           = $req->all();
        $menu           = Menu::find($data['id']);
        $menu->title    = $data['title'];
        $menu->url      = $data['url'];
        $menu->icon     = $data['icon'];
        $menu->parent_id   = $data['parent_id'];
        $menu->save();
        return redirect('/daftarmenu')->with('pesan','Data berhasil diubah');
    }
    public function deletemenu($id){
        $menu = Menu::find($id);
        $menu->role()->detach();
        $menu->delete();
        return redirect('/admin/daftarmenu')->with('pesan','Data berhasil dihapus');
    }
    public function daftarrole(){
        $data['roles'] = Role::all();
        return view('adminsystem.daftarrole', $data);
    }
    public function ubahrole($id){
        $data['roles'] = Role::find($id);
        $data['menu'] = Menu::tree();
        return view('adminsystem.ubahrole', $data);
    }
    public function ubah_role(Request $req){
        $data       = $req->all();
        $role       = Role::find($data['id']);
        $role->name = $data['name'];
        $role->save();
        return redirect('/daftarrole')->with('pesan','Data berhasil diubah');
    }
}
