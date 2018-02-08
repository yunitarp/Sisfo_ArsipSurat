@extends('base')
@section('css')
	<link rel="stylesheet" href="{{url('kp')}}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{url('kp')}}/plugins/datepicker/datepicker3.css">
  	<link rel="stylesheet" href="{{url('kp')}}/plugins/select2/select2.min.css">
@endsection
	@section('content')
		<section class="content-header">
	      <h1>
	        Entri Surat Masuk
	        <small></small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i>Surat Masuk</a></li>
	        <li class="active">Entri Baru</li>
	      </ol>
	    </section>
	    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Surat Masuk Baru</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/inputsuratmasuk')}}" method="post" enctype="multipart/form-data">
		        	<input type="hidden" name="_token" value="{{ csrf_token() }}"><!-- /.box-body -->
	                <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">No. Surat</label>
	          			<div class="col-sm-3">
	          			<input type="text" class="form-control" name="no_surat" placeholder="Masukkan Nomor Surat">
	          			</div>
		            </div><!-- /.box-body -->
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Tanggal Surat</label>
                        <div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tgl_surat"/>
                        </div><!-- /.input group -->
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Tanggal Terima</label>
	          			<div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tgl_terima"/>
                        </div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" >Sumber Surat</label>
                        <div class="col-sm-3">
                           <select class="form-control" name="instansi_id">
                                <option selected="selected">--PILIH INSTANSI--</option>
                                @foreach($instansi as $isi)
                                	<option value="{{$isi['id']}}">{{$isi['id']}} {{$isi['nama']}}</option>
                                @endforeach   
                            </select>
                        </div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" >Media Pengiriman</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="jenis_pengiriman">
                                <option selected="selected">--PILIH MEDIA PENGIRIMAN--</option>
                                <option value="Email">Email</option>
                                <option value="Pos">Pos</option>
                                <option value="Fax">Fax</option>
                                <option value="Email dan Pos">Email & Pos</option> 
                                <option value="Email dan Fax">Email & Fax</option>
                                <option value="Pos dan Fax">Pos & Fax</option>
                               	<option value="Email, Pos, dan Fax">Email, Pos & Fax</option>
                            </select>
                        </div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Perihal</label>
	          			<div class="col-sm-3">
	          			<textarea type="text" class="form-control" name="perihal" placeholder="Masukkan Perihal"></textarea>
	          			</div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Isi Ringkas</label>
	          			<div class="col-sm-3">
	          			<textarea type="text" class="form-control" name="isi_ringkas" placeholder="Masukkan Isi Ringkas"></textarea>
	          			</div>
		            </div>
		            <div class="form-group">
		            	<label class="col-sm-2">Tag</label>
		            	<div>
		            		<select class="form-control select2" name="tag[]" multiple="multiple" data-placeholder="Masukkan tag" style="width:30%;" onchange="console.log($(this).val())">
		            			@foreach($tag as $tags)
		            				<option>{{$tags->nama_tag}}</option>
		            			@endforeach
		            		</select>
		            	</div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Prioritas</label>
	          			<div class="col-sm-3">
                            <select class="form-control" name="prioritas">
                                <option selected="selected">--PILIH PRIORITAS--</option>
                                <option value="Biasa">Biasa</option>
                                <option value="Segera">Segera</option>
                                <option value="Urgent">Urgent</option>  
                            </select>
                        </div>
		            </div>
		            <div class="form-group">
	                  <label class="col-sm-2" for="exampleInputFile">Input File</label>
	                  <div class="col-sm-3">
	                  	<input type="file" id="exampleInputFile" name="file">
	                  	<p class="help-block">Masukkan File Surat Masuk di Sini</p>
	                  </div>
	                </div>
	                <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Untuk Divisi</label>
	          			<div class="col-sm-3">
                            <select class="form-control" name="divisi_id">
                                <option selected="selected">--PILIH DIVISI--</option>
                                @foreach($divisis as $divisi)
                                <option value="{{$divisi->nama}}">{{$divisi->nama}}</option>
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
<script src="{{url('kp')}}/plugins/select2/select2.full.min.js"></script>

        <script type="text/javascript">
        $(document).ready(function(){
            //Date picker
            $('.datepicker').datepicker({
              autoclose: true
            });
   			$(".select2").select2({
			  tags: true
			});
        });

        </script>
@endsection