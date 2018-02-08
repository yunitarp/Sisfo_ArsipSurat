@extends('base')
@section('css')

@endsection
	@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kelola Instansi
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Instansi</a></li>
        <li class="active">Tambah Instansi</li>
      </ol>
    </section>
    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Instansi Baru</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/inputinstansi')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="box-body">
		                  <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Nama Instansi</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="nama" placeholder="Masukkan Jenis Client">
		          			</div>
		              </div><!-- /.box-body -->
                    <div class="form-group">
                            <label class="col-sm-2" for="exampleInputEmail1">Alamat</label>
                            <div class="col-sm-3">
                            <textarea type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat"></textarea>
                            </div>
                    </div><!-- /.box-body -->
                    <div class="form-group">
                            <label class="col-sm-2" >Kota</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="kota_id">
                                    <option selected="selected">--PILIH KOTA--</option>
                                    @foreach($kota as $city)
                                        <option value="{{$city['id']}}">{{$city['nama']}}</option>
                                    @endforeach    
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" >Provinsi</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="provinsi_id">
                                <option selected="selected">--PILIH PROVINSI--</option>
                                @foreach($provinsi as $prov)
                                        <option value="{{$prov['id']}}">{{$prov['nama']}}</option>
                                @endforeach     
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2">No Telepon</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telepon">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2">No Fax</label>
                            <div class="col-sm-3">
                            <input type="text" class="form-control" name="fax" placeholder="Masukkan No Fax">
                            </div>
                    </div>
                    <div class="form-group">
                            <label class="col-sm-2">Email</label>
                            <div class="col-sm-3">
                            <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2" >Jenis Client</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="jenis_id">
                                <option selected="selected">--PILIH JENIS CLIENT--</option>
                                @foreach($client as $cl)
                                    <option value="{{$cl['id']}}">{{$cl['jenis_client']}}</option>
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

@endsection