<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminsysController extends Controller
{
    public function index(){
    	return view('adminsystem.dashboard.index');
    }
}
