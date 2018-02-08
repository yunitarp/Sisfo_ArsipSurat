@extends('base')
@section('css')
	<link rel="stylesheet" href="{{url('kp')}}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{url('kp')}}/plugins/datepicker/datepicker3.css">
@endsection
	@section('content')
	<section class="content-header">
      <h1>
        Ubah Surat Masuk
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Surat Masuk</a></li>
        <li class="active">Ubah Surat Masuk</li>
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
		        <form class="form-horizontal" action="{{url('/ubahsuratmasuk')}}" method="post" enctype="multipart/form-data">
		        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="box-body">
		                  <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">No. Agenda</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="no_agenda" value="{{$suratmasuk['no_agenda']}}">
		          			<input type="hidden" name="id" value="{{$suratmasuk->id}}"/>
		          			</div>
		            </div><!-- /.box-body -->
	                <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">No. Surat</label>
	          			<div class="col-sm-3">
	          			<input type="text" class="form-control" name="no_surat" value="{{$suratmasuk['no_surat']}}">
	          			</div>
		            </div><!-- /.box-body -->
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Tanggal Surat</label>
                        <div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tgl_surat" value="{{$suratmasuk['tgl_surat']}}"/>
                        </div><!-- /.input group -->
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Tanggal Terima</label>
	          			<div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tgl_terima" value="{{$suratmasuk['tgl_terima']}}"/>
                        </div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" >Sumber Surat</label>
                        <div class="col-sm-3">
                           <select class="form-control" name="instansi_id">
                                @foreach($instansi as $ins)
                                	<option selected="<?php if($suratmasuk['instansi_id'] == $ins->id) echo 'selected'; else echo "";?>" value="{{$ins->id}}">
                                	{{$ins['nama']}}
                                	</option>
                                @endforeach   
                            </select>
                        </div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Perihal</label>
	          			<div class="col-sm-3">
	          			<textarea name="perihal"><?php echo $suratmasuk['perihal'] ?></textarea>
	          			</div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Isi Ringkas</label>
	          			<div class="col-sm-3">
	          			<textarea name="isi ringkas"><?php echo $suratmasuk['isi_ringkas'] ?></textarea>
	          			</div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Prioritas</label>
	          			<div class="col-sm-3">
                            <select class="form-control" name="prioritas">
                                <option selected="<?php if($suratmasuk['prioritas'] == "Biasa") echo 'selected'; else echo "";?>" value="Biasa">Biasa</option>
                                <option selected="<?php if($suratmasuk['prioritas'] == "Segera") echo 'selected'; else echo "";?>"value="Segera">Segera</option>
                                <option selected="<?php if($suratmasuk['prioritas'] == "Urgent") echo 'selected'; else echo "";?>"value="Urgent">Urgent</option>  
                            </select>
                        </div>
		            </div>
		            <div class="form-group">
	                    <label class="col-sm-2" >Media Pengiriman</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="jenis_pengiriman">
                                <option selected="<?php if($suratmasuk['jenis_pengiriman'] == "Email") echo 'selected'; else echo "";?>" value="Email">Email</option>
                                <option selected="<?php if($suratmasuk['jenis_pengiriman'] == "Fisik") echo 'selected'; else echo "";?>" value="Fisik">Pos/Fisik</option>
                                <option selected="<?php if($suratmasuk['jenis_pengiriman'] == "Email dan Fisik") echo 'selected'; else echo "";?>" value="Email dan Fisik"> Email & Pos/Fisik</option>  
                            </select>
                        </div>
		            </div>
		            <div class="form-group">
		            	<label class="col-sm-2" >Ubah File?</label>
		            	<div class="col-sm-3">
		            		<select class="form-control" name="ubahfile" id="ubahfile" onchange="gantifile(this)">
		            			<option selected="selected">--MASUKKAN PILIHAN--</option>
		            			<option value="ya">Ya</option>
		            			<option value="tidak">Tidak</option>
		            		</select>
		            	</div>
		            </div>
		            <div id ="isUbahFile"class="form-group">
	                  <label class="col-sm-2" for="exampleInputFile">Input File</label>
	                  <div class="col-sm-3">
	                  	<input type="file" id="exampleInputFile" name="file">
	                  	<p class="help-block">Masukkan File Surat Masuk di Sini</p>
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
   gantifile($("#ubahfile"));
});
var gantifile = function(o){
		val = $(o).val();
		if (val == 'ya'){
			$("#isUbahFile").show();
		}else{
			$("#isUbahFile").hide();
		}
	}
</script>

@endsection