@extends('base')
@section('css')

@endsection
	@section('content')
		<section class="content-header">
	      <h1>
	        Data Instansi
	        <small></small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="/index"><i class="fa fa-dashboard"></i>Home</a></li>
	        <li class="active">Data Instansi</li>
	      </ol>
	    </section>
	    <section class="content">
	    	<div class="row">
	    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	            <div class="box-header">
	                <h3 class="box-title">Form Ubah Instansi</h3>
	            </div><!-- /.box-header -->
	            	<!-- form start -->
			        <form class="form-horizontal" action="{{url('/ubahinstansi')}}" method="post">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
			            <div class="box-body">
			                  <div class="form-group">
			                    <label class="col-sm-2" for="exampleInputEmail1">Nama Instansi</label>
			          			<div class="col-sm-3">
			          			<input type="text" class="form-control" name="nama" value="{{$instansi->nama}}">
			          			<input type="hidden" name="id" value="{{$instansi->id}}"/>
			          			</div>
			              </div><!-- /.box-body -->
	                    <div class="form-group">
	                            <label class="col-sm-2" for="exampleInputEmail1">Alamat</label>
	                            <div class="col-sm-3">
	                            <textarea type="text" class="form-control" name="alamat" value="{{$instansi->alamat}}"><?php echo $instansi['alamat'] ?></textarea>
	                            </div>
	                    </div><!-- /.box-body -->
	                    <div class="form-group">
	                            <label class="col-sm-2" >Kota</label>
	                            <div class="col-sm-3">
	                                <select class="form-control" name="kota_id">
	                                    <option selected="selected">--PILIH KOTA--</option>
	                                    @foreach($kota as $city)
	                                        <option <?php if($instansi['kota_id'] == $city->id) echo 'selected';?> value="{{$city['id']}}">{{$city['nama']}}</option>
	                                    @endforeach    
	                                </select>
	                            </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-2" >Provinsi</label>
	                        <div class="col-sm-3">
	                            <select class="form-control" name="provinsi_id">
	                                @foreach($provinsi as $prov)
	                                    <option <?php if($instansi['provinsi'] == $prov->id) echo 'selected';?> value="{{$prov['id']}}">{{$prov['nama']}}</option>
	                                @endforeach     
	                            </select>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                            <label class="col-sm-2">No Telepon</label>
	                            <div class="col-sm-3">
	                            <input type="text" class="form-control" name="no_telp" value="{{$instansi->no_telp}}">
	                            </div>
	                    </div>
	                    <div class="form-group">
	                            <label class="col-sm-2">No Fax</label>
	                            <div class="col-sm-3">
	                            <input type="text" class="form-control" name="fax" value="{{$instansi->fax}}">
	                            </div>
	                    </div>
	                    <div class="form-group">
	                            <label class="col-sm-2">Email</label>
	                            <div class="col-sm-3">
	                            <input type="email" class="form-control" name="email" value="{{$instansi->email}}">
	                            </div>
	                    </div>
	                    <div class="form-group">
	                        <label class="col-sm-2" >Jenis Client</label>
	                        <div class="col-sm-3">
	                            <select class="form-control" name="jenis_id">
	                                @foreach($client as $cl)
	                                    <option <?php if($instansi['jenis_id'] == $cl->id) echo 'selected';?> value="{{$cl['id']}}">{{$cl['jenis_client']}}</option>
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