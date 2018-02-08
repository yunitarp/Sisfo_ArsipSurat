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
	        <li class="active">Entri Disposisi</li>
	      </ol>
	    </section>
	    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Disposisi Baru</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/inputdisposisi')}}" method="post">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		        <div class="box-body">
		        	<div class="form-group">
		        		<label class="col-sm-2">No Surat</label>
		        		<div class="col-sm-3">
	          				<input type="text" class="form-control" name="suratmasuk_id" value="{{$suratmasuk->no_surat}}" disabled>
	          				<input type="hidden" name="suratmasuk_id" value="{{$suratmasuk->id}}"/>
	          			</div>
		        	</div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Tanggal Surat</label>
                        <div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tgl_surat" value="{{$suratmasuk->tgl_surat}}" disabled/>
                        </div><!-- /.input group -->
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Tanggal Terima</label>
	          			<div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tgl_catat" value="{{$suratmasuk->tgl_catat}}" disabled/>
                        </div>
		            </div>
		        	<div class="form-group">
		        		<label class="col-sm-2">Perihal</label>
		        		<div class="col-sm-3">
	          				<textarea type="text" class="form-control" disabled=""><?php echo $suratmasuk['perihal'] ?></textarea>
	          			</div>
		        	</div>
		        	<div class="form-group">
		        		<label class="col-sm-2">Sifat</label>
		        		<div class="col-sm-3">
		        			<select class="form-control" >
	          					<option selected value="{{$suratmasuk->prioritas}}" disabled>{{$suratmasuk->prioritas}}</option>
	          				</select>
	          			</div>
		        	</div>
		        	<div class="form-group">
	                    <label class="col-sm-2" >Kepada Divisi</label>
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
		        		<label class="col-sm-2">Disposisi Direktur</label>
		        		<div class="col-sm-3">
	          				<textarea type="text" class="form-control" name="isi_disposisi" placeholder="Masukkan Isi Disposisi"></textarea>
	          			</div>
		        	</div>
		        	<div class="form-group">
		        		<label class="col-sm-2">Disposisi Manajer</label>
		        		<div class="col-sm-3">
	          				<textarea type="text" class="form-control" name="disposisi_manajer" placeholder="Masukkan Isi Disposisi"></textarea>
	          			</div>
		        	</div>
		        	<div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Batas Waktu</label>
	          			<div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="batas_waktu"/>
                        </div>
		            </div>
		            <div class="form-group">
		        		<label class="col-sm-2">Catatan</label>
		        		<div class="col-sm-3">
	          				<input type="text" class="form-control" name="catatan">
	          			</div>
		        	</div>
		        	<div class="form-group">
	                    <label class="col-sm-2" >Karyawan Pengeksekusi</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="karyawan_id">
                                <option selected="selected">--PILIH KARYAWAN--</option>
                                @foreach($karyawan as $kar)
                                	<option value="{{$kar['id']}}">{{$kar['nama']}}</option>
                                @endforeach   
                            </select>
                        </div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" >Status Disposisi</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="status">
                                <option selected="selected" value="NULL">--PILIH STATUS--</option>
                               	<option value="Dalam Proses">Dalam Proses</option>
                               	<option value="Selesai">Selesai</option>  
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