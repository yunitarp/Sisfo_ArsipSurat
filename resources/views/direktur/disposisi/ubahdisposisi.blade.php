@extends('base')
	@section('css')
	<link rel="stylesheet" href="{{url('kp')}}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{url('kp')}}/plugins/datepicker/datepicker3.css">
	@endsection
	@section('content')
		<section class="content-header">
	      <h1>
	        Entri Disposisi
	        <small></small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i>Disposisi</a></li>
	        <li class="active">Ubah Disposisi</li>
	      </ol>
	    </section>
	    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Edit Disposisi</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/ubahdisposisi')}}" method="post">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		        <div class="box-body">
		        	<div class="form-group">
		        		<label class="col-sm-2">No Surat Masuk</label>
		        		<div class="col-sm-3">
	          				<input type="text" class="form-control" value="{{$disposisi->suratmasuk->no_surat}}" disabled>
	          				<input type="hidden" name="id" value="{{$disposisi->id}}"/>
	          			</div>
		        	</div>
		        	<div class="form-group">
		        		<label class="col-sm-2">Nama Instansi</label>
		        		<div class="col-sm-3">
	          				<input type="text" class="form-control" value="{{$disposisi->suratmasuk->instansi->nama}}" disabled>
	          			</div>
		        	</div>
		        	<div class="form-group">
		        		<label class="col-sm-2">Disposisi Direktur</label>
		        		<div class="col-sm-3">
	          				<textarea type="text" class="form-control" disabled><?php echo $disposisi['isi_disposisi'] ?></textarea>
	          			</div>
		        	</div>
		        	<div class="form-group">
		        		<label class="col-sm-2">Disposisi Manajer</label>
		        		<div class="col-sm-3">
	          				<textarea type="text" class="form-control" disabled><?php echo $disposisi['disposisi_manajer'] ?></textarea>
	          			</div>
		        	</div>
		        	<div class="form-group">
	                    <label class="col-sm-2" >Kepada Divisi</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="divisi_id">
                                @foreach($divisi as $div)
                                	<option <?php if($disposisi['divisi_id'] == $div->id) echo 'selected';?> value="{{$div['id']}}">{{$div['nama']}}</option>
                               	@endforeach   
                            </select>
                        </div>
		            </div>
		        	<div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Batas Waktu</label>
	          			<div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="batas_waktu" value="{{$disposisi['batas_waktu']}}"/>
                        </div>
		            </div>
		        	<div class="form-group">
	                    <label class="col-sm-2" >Karyawan Pengeksekusi</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="karyawan_dituju">
                                @foreach($karyawan as $kar)
                                	<option <?php if($disposisi['karyawan_dituju'] == $kar->id) echo 'selected';?> value="{{$kar['id']}}">{{$kar['nama']}}</option>
                                @endforeach   
                            </select>
                        </div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" >Status Disposisi</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="status">=
                               	<option <?php if($disposisi['status'] == "Dalam Proses") echo 'selected';?> value="Dalam Proses">Dalam Proses</option>
                               	<option <?php if($disposisi['status'] == "Selesai") echo 'selected';?> value="Selesai">Selesai</option>  
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