@extends('base')
@section('css')
	<link rel="stylesheet" href="{{url('kp')}}/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="{{url('kp')}}/plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="{{url('kp')}}/plugins/select2/select2.min.css">
@endsection
	@section('content')
		<section class="content-header">
	      <h1>
	        Entri Surat Keluar
	        <small></small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i>Surat Keluar</a></li>
	        <li class="active">Entri Baru</li>
	      </ol>
	    </section>
	    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Surat Keluar Baru</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/inputsuratkeluar')}}" method="post" enctype="multipart/form-data" id="formsurat">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		        <div class="box-body">
		            <div class="form-group">
	                    <label class="col-sm-2" >Jenis Surat</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="jenis_surat" id="jenis_surat" onchange="gantiJenis(this)">
                                <option selected="selected">--PILIH JENIS SURAT--</option>
                                <option value="balasan">Surat Balasan</option>
                                <option value="baru">Surat Baru</option>  
                            </select>
                        </div>
		            </div><!-- /.box-body -->
	                <div id ="isBalasan" class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Surat Rujukan</label>
	          			<div class="col-sm-3 input-group">
                        <select class="form-control" name="instansi" id="instansi" onchange="isiInstansi(this)">
                            <option selected="selected">--PILIH INSTANSI--</option>
                            @foreach($instansi as $isi)
                            	<option value="{{$isi['id']}}">{{$isi['nama']}}</option>
                            @endforeach    
                        </select>
                    	</div>
		            </div>
		            <input type="hidden" id="idsuratmasuk" name="suratmasuk_id"/>
		            <div class="row" id="datasuratmasuk">
			            <div class="col-md-6">
				          <div class="box box-solid">
				            <div class="box-header with-border">
				              <i class="fa fa-text-width"></i>

				              <h3 class="box-title">Data Surat Masuk</h3>
				            </div>
				            <div class="box-body">
				              <dl class="dl-horizontal">
				                <dt>No Surat</dt>
				                <dd id="nosuratmasuk"></dd>
				                <dt>Nama Instansi</dt>
				                <dd id="namainstansisuratmasuk"></dd>
				                <dt>Prihal</dt>
				                <dd id="prihalsuratmasuk"></dd>
				                <dt>Isi Ringkas</dt>
				                <dd id="isiringkassuratmasuk"></dd>
				              </dl>
				            </div>
				          </div>
				        </div>
				    </div>
			         <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">No Surat</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="no_surat" placeholder="Masukkan Nomor Surat">
		          			</div>
			            </div>
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
	                    <label class="col-sm-2" for="exampleInputEmail1">Tanggal Kirim</label>
	          			<div class="col-sm-3 input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control datepicker" name="tgl_catat"/>
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
	                    <label class="col-sm-2" >Instansi Tujuan</label>
                        <div class="col-sm-3">
                            <select class="form-control" name="instansi_id">
                                <option selected="selected">--PILIH INSTANSI--</option>
                                @foreach($instansi as $isi)
                                	<option value="{{$isi['id']}}">{{$isi['nama']}}</option>
                                @endforeach    
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
	                    <label class="col-sm-2" for="exampleInputEmail1">Keterangan</label>
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
		            <div class="box-footer">
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </div>
		        </form>
        </div><!-- /.box -->
    	</div>
    	</div>
    </section>

        <div id="ex1-dialog">
	          <div class="box">
	            <div class="box-header">
	              <center><h3 class="box-title">Tabel Data Surat Masuk</h3></center>

	            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover" id="table_akun">
	              <thead>
	                <tr>
	                  <th>Instansi Tujuan</th>
	                  <th>No Surat</th>
	                  <th>Tanggal Surat</th>
	                  <th>Tanggal Terima</th>
	                  <th>Isi Ringkas</th>
	                  <th>Keterangan</th>
	                  <th>File</th>
	                  <th>Action</th>
	                </tr>
	               </thead>
	               <tbody id="isi_table">
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
	    </div>
	@endsection
@section('js')
	<script src="{{url('kp')}}/plugins/datepicker/bootstrap-datepicker.js"></script>
	<script src="{{url('kp')}}/plugins/select2/select2.full.min.js"></script>

	<!-- Don't forget to include jQuery ;) -->
  <script src="jquery.modal.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript">
        var dialog;
        $(document).ready(function(){
        	$("#datasuratmasuk").hide();
        	$("#isBalasan").hide();
        	dialog = $( "#ex1-dialog" ).dialog({
		      autoOpen: false, //dicoba dulu nampilin
		      modal: true,
		      width: 'auto',
		      height: 'auto'
		    });
            //Date picker
            $('.datepicker').datepicker({
              autoclose: true
            });
            $(".select2").select2({
			  tags: true
			});
        });

        $("#formsurat").on('submit', function(e) {
		    var isValid = (($("#jenis_surat").val() == "balasan" && $("#idsuratmasuk").val() != "") || ($("#jenis_surat").val() == "baru"));
		    if(!isValid) {
		      e.preventDefault(); //prevent the default action
		      alert('Harap pilih surat masuk terlebih dahulu');
		    }
		});

        var isiInstansi = function(o){
        	dialog.dialog('open')
        	id = $(o).val()
        	console.log(id)
        	$.ajax({
		      url: "{{url('/changemasuk')}}", 
		      data: {"id":id},
		      method: "POST",
		      success:function(data){
		      	console.log(data);
		        isi = "";
		        data.forEach(function(content,index){
		          isi += "<tr>";
		          isi += "<td>"+content['instansi'].nama+"</td>";
	              isi += "<td>"+content['no_surat']+"</td>";
	              isi += "<td>"+content['tgl_surat']+"</td>";
	              isi += "<td>"+content['tgl_terima']+ "</td>";
	              isi += "<td>"+content['isi_ringkas']+"</td>";
	              isi += "<td>"+content['keterangan']+"</td>";
	              isi += "<td>"+content['original_filename']+"</td>";
	              isi += "<td><button type='button' class='btn btn-info' onclick=\"kirimvalues('"+content['id']+"','"+content['no_surat']+"','"+content['instansi'].nama+"','"+content['perihal']+"','"+content['isi_ringkas']+"')\">Pilih</button></td>";
		          isi += "</tr>";
		        });
		        $("#isi_table").html(isi);
		      }
        	})
        }

        var kirimvalues = function(id, no, nama, prihal, isi){
        	dialog.dialog('close');
        	$("#datasuratmasuk").show();
        	$("#idsuratmasuk").val(id);
        	$("#nosuratmasuk").html(no);
        	$("#namainstansisuratmasuk").html(nama);
        	$("#prihalsuratmasuk").html(prihal);
        	$("#isiringkassuratmasuk").html(isi);
        }

        var gantiJenis = function(o){
			val = $(o).val();
			if (val == 'baru'){
	        	$("#datasuratmasuk").hide();
	        	$("#isBalasan").hide();
			}else{
				$("#isBalasan").show();
			}
		}
        </script>

@endsection