<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function lihatuser(){
    	$user['user'] = User::all();
    	return view('admin.user.lihatuser', $user);
    }
    public function input_user(Request $req){
    	$data = $req->all();
    	$user = new User();
    	$user->password 	= md5($data['password']);
    	$user->username 	= $data['username'];
    	$user->nama 		= $data['nama'];
    	$user->nip 			= $data['nip'];
    	$user->role_id 		= $data['role_id'];
    	$user->save();
    	return back();
    }
    public function delete_user($id){
        User::find($id)->delete();
        return back();
    }
    public function ubahuser($id){
        $data['user']   = User::find($id);
        $data['role']   = Role::all();
        return view('admin.user.ubahuser', $data);
    }
    public function ubah_user(Request $req){
        $data               = $req->all();
        $user               = User::find($data['id']);
        $user->username     = $data['username'];
        $user->password     = md5($data['password']);
        $user->nip          = $data['nip'];
        $user->nama         = $data['nama'];
        $user->role_id      = $data['role_id'];
        $user->save();
        return back();
    }
}
