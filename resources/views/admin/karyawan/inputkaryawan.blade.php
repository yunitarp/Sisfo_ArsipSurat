@extends('base')
@section('css')
     <link rel="stylesheet" href="{{url('kp')}}/plugins/daterangepicker/daterangepicker.css">
     <link rel="stylesheet" href="{{url('kp')}}/plugins/datepicker/datepicker3.css">

@endsection
	@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelola Karyawan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Karyawan</a></li>
        <li class="active">Tambah Karyawan</li>
      </ol>
    </section>
    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Karyawan Baru</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/inputkaryawan')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="box-body">
		                  <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Username</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="username" placeholder="Masukkan Username">
		          			</div>
		              </div><!-- /.box-body -->
                    <div class="form-group">
                            <label class="col-sm-2" for="exampleInputEmail1">Password</label>
                            <div class="col-sm-3">
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password">
                            </div>
                    </div><!-- /.box-body -->
                    <div class="form-group">
                            <label class="col-sm-2" for="exampleInputEmail1">NIK</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2" for="exampleInputEmail1">Nama</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2" for="exampleInputEmail1">Nama Alias</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="alias" placeholder="Masukkan Nama Alias">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2" >Tempat Lahir</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="tempat_lahir">
                                    <option selected="selected">--PILIH KOTA--</option>
                                    @foreach($kota as $ko)
                                        <option value="{{$ko['id']}}">{{$ko['nama']}}</option>
                                    @endforeach    
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="exampleInputEmail1">Tanggal Lahir</label>
                        <div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tanggal_lahir"/>
                        </div><!-- /.input group -->
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2">No Telepon</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan No Telepon">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="exampleInputEmail1">Alamat</label>
                        <div class="col-sm-3">
                        <textarea type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="form-group">
                        <label class="col-sm-2">Kecamatan</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="kecamatan" placeholder="Masukkan Kecamatan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" >Kota</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="kota_id">
                                <option selected="selected">--PILIH KOTA--</option>
                                @foreach($kota as $ko)
                                    <option value="{{$ko['id']}}">{{$ko['nama']}}</option>
                                @endforeach   
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Kode Pos</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="kodepos" placeholder="Masukkan Kodepos">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">No Telepon 1</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_telp1" placeholder="Masukkan Nomor Telepon 1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">No Telepon 2</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_telp2" placeholder="Masukkan Nomor Telepon 2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Email</label>
                        <div class="col-sm-3">
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Pendidikan</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="pendidikan" placeholder="Masukkan Pendidikan">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="exampleInputEmail1">Tanggal Masuk</label>
                        <div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tanggal_masuk"/>
                        </div><!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" >Divisi</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="divisi_id">
                                <option selected="selected">--PILIH DIVISI--</option>
                                @foreach($divisi as $div)
                                    <option value="{{$div['id']}}">{{$div['nama']}}</option>
                                @endforeach     
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Posisi</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="posisi" placeholder="Masukkan Posisi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" >Role</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="role_id">
                                @foreach($role as $rl)
                                    <option value="{{$rl->id}}">{{$rl->name}}</option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
		            <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </div>
		        </form>
        </div><!-- /.box -->
    	</div>
    	</div>
    </section>
	@endsection

@section('js')
    <script src="{{url('kp')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
        $(document).ready(function(){
            //Date picker
            $('.datepicker').datepicker({
              autoclose: true
            });
        });
        </script>
@endsection