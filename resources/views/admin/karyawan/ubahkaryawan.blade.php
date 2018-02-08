@extends('base')
	@section('css')
		<link rel="stylesheet" href="{{url('kp')}}/plugins/datepicker/datepicker3.css">
	@endsection
	@section('content')
		<section class="content-header">
        <h1>
            Akun
            <small>Ubah Akun Karyawan</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">Karyawan</li>
        </ol>
    </section>
    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Ubah Karyawan</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/ubahkaryawan')}}" method="POST">
		            <div class="box-body">
		                <div class="form-group">
		                    <label class="col-sm-2" >Username</label>
		          			<div class="col-sm-3">
		          			<input type="text" value="{{$karyawan['username']}}" class="form-control" disabled="">
		          			<input type="hidden" name="id" value="{{$karyawan->id}}"/>
		          			</div>
		                </div>
                        <div class="form-group">
                            <label class="col-sm-2" >Password</label>
                            <div class="col-sm-3">
                            <input type="password" name="password" value="{{$karyawan['password']}}" class="form-control">
                            </div>
                        </div>
		                <div class="form-group">
                            <label class="col-sm-2" for="exampleInputEmail1">NIK</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="nik" placeholder="Masukkan NIK" value="{{$karyawan['nik']}}">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2" for="exampleInputEmail1">Nama</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama" value="{{$karyawan['nama']}}">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2" for="exampleInputEmail1">Nama Alias</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="alias" placeholder="Masukkan Nama Alias" value="{{$karyawan['alias']}}">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2" >Tempat Lahir</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="tempat_lahir">
                                @foreach($kota as $kot)
                                    <option selected="<?php if($karyawan['tempat_lahir'] == $kot->id) echo 'selected'; else echo "";?>" value="{{$kot->id}}">
                                    {{$kot['nama']}}
                                    </option>
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
                            <input class="form-control datepicker" name="tanggal_lahir" value="{{$karyawan['tanggal_lahir']}}"/>
                        </div><!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="exampleInputEmail1">Alamat</label>
                        <div class="col-sm-3">
                        <textarea name="alamat"><?php echo $karyawan['alamat'] ?></textarea>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="form-group">
                        <label class="col-sm-2">Kecamatan</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="kecamatan" value="{{$karyawan['kecamatan']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" >Kota</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="kota_id">
                                @foreach($kota as $kot)
                                    <option <?php if($karyawan['kota_id'] == $kot->id) echo 'selected'; else echo "";?> value="{{$kot->id}}">
                                    {{$kot['nama']}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Kode Pos</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="kodepos" value="{{$karyawan['kodepos']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">No Telepon 1</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_telp1" value="{{$karyawan['no_telp1']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">No Telepon 2</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="no_telp2" value="{{$karyawan['no_telp2']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Email</label>
                        <div class="col-sm-3">
                        <input type="email" class="form-control" name="email" value="{{$karyawan['email']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Pendidikan</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="pendidikan" value="{{$karyawan['pendidikan']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" for="exampleInputEmail1">Tanggal Masuk</label>
                        <div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tanggal_masuk" value="{{$karyawan['tanggal_masuk']}}"/>
                        </div><!-- /.input group -->
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" >Divisi</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="divisi_id">
                            @foreach($divisi as $div)
                                <option <?php if($karyawan['divisi_id'] == $div->id) echo 'selected';?> value="{{$div->id}}">
                                    {{$div['nama']}}
                                </option>
                            @endforeach 
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2">Posisi</label>
                        <div class="col-sm-3">
                        <input type="text" class="form-control" name="posisi" value="{{$karyawan['posisi']}}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" >Role</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="role_id">
                                @foreach($role as $rol)
                                <option <?php if($karyawan['role_id'] == $rol->id) echo 'selected';?> value="{{$rol->id}}">
                                    {{$rol['name']}}
                                </option>
                                @endforeach 
                            </select>
                        </div>
                    </div>
		            <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </div>
		            </div><!-- /.box-body -->
		        </form>
        </div><!-- /.box -->
    	</div>
    	</div>
    </section>
	@endsection
@section('js')
	<script src="{{url('kp')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$('.datepicker').datepicker({
              autoclose: true
            });
	</script>
@endsection