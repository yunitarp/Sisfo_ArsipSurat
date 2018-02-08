@extends('base')
@section('css')
	<link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection
	@section('content')
	<section class="content-header">
      <h1>
        Data Surat
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="">Surat Masuk</li>
        <li class="active">Cari Surat Masuk</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <center><h3 class="box-title">Cari Data Surat</h3></center>
            </div>
            <div class="box-body">
                <div class="form-group">
                <label class="col-sm-2">Pilih Tanggal:</label>
                <div class="col-sm-2 input-group">
                  <button type="button" class="form-control btn btn-default pull-right" id="daterange-btn">
                    <span id="rangeWaktu">{{$before."-".$after}}</span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
              <div class="form-group">
              	<label class="col-sm-2">Pilih Surat</label>
              	<div class="col-sm-2 input-group">
              	<select class="form-control" name="jenis" id="jenis">
              		<option selected value="">--PILIH SURAT--</option>
              		<option value="suratmasuk">Surat Masuk</option>
              		<option value="suratkeluar">Surat Keluar</option>
              	</select>
              	</div>
              </div>
              <div class="form-group">
              <label class="col-sm-2">Pilih Tag:</label>
                <div class="col-sm-2 input-group">
                  <select class="form-control" name="tag_id" id="tag">
                    <option <?php if($idtag == null) echo "selected" ?> value="0">--PILIH TAG--</option>
                    @foreach($tags as $tag)
                    	<option <?php if($tag->id == $idtag) echo "selected" ?> value="{{$tag->id}}">{{$tag->nama_tag}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
              	<div class="col-sm-2"></div>
                <div class="col-sm-2 input-group">
                	<button onclick="isiTag()" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div>
            </div>
            <center><h3 class="box-title">Data Surat</h3></center>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table_akun" id="">
              <thead>
                <tr>
                  <th>No Surat</th>
                  <th>Tanggal Terima</th>
                  <th>Perihal</th>
                  <th>Isi Ringkas</th>
                  <th>File</th>
                </tr>
               </thead>
               <tbody>
               @foreach($surats as $surat)
                <tr>
                  <td>{{$surat['no_surat']}}</td>
                  <td>{{$surat['tgl_terima']}}</td>
                  <td>{{$surat['perihal']}}</td>
                  <td>{{$surat['isi_ringkas']}}</td>
                  <td><a href="{{url('/showsuratmasuk').'/'.$surat['filename']}}">{{$surat['original_filename']}}</a></td>
                </tr>
               @endforeach
                </tbody>
              </table>
            </div>
        </div>
          <!-- /.box -->
        </div>
      </div>
      </div>
      <!-- /.row -->
    </section>
	@endsection

@section('js')
<script src="{{url('kp')}}/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
		$('.table_akun').DataTable({
		    "paging": true,
		    "lengthChange": true,
		    "searching": true,
		    "ordering": true,
		    "info": true,
		    "autoWidth": false
		  });
		var daterangepicker_start = jQuery("#daterangepicker_start").val(); 
		var daterangepicker_end = jQuery("#daterangepicker_end").val();
		$('#daterange-btn').daterangepicker(
	        {
	          ranges: {
	            'Today': [moment(), moment()],
	            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	            'This Month': [moment().startOf('month'), moment().endOf('month')],
	            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	          },
	          startDate: moment(),
	          endDate: moment()
	        },
	        function (start, end) { //ini fungsi buat ketika klik apply di range picker
	        	$("#rangeWaktu").html(start.format('YYYY-MM-DD') + '-' + end.format('YYYY-MM-DD'));
	          // document.location.href = "{{url('direktur/lihatdisposisi').'/'}}"+start.format('YYYY-MM-DD') + '/' + end.format('YYYY-MM-DD');
	          // $('#daterange-btn span').html(start.format('YYYY/MM/DD') + '-' + end.format('YYYY/MM/DD'));
	        }
	    );

    	var isiTag = function(){
    		waktu = $("#rangeWaktu").html();
    		console.log(waktu);
    		start = waktu.substr(0,10);
    		end = waktu.substr(11,10);
    		tag = $("#tag").val();
    		jenis = $("#jenis").val();
    		if(tag != 0 && jenis != ""){
	    		document.location.href = "{{url('/carisurat')}}/"+ start + '/' + end + '/' + jenis + '/' +tag;
    		}
	    	else{
	    		alert('Harap pilih jenis surat dan tag terlebih dahulu');
	    	}
		}
	    
	</script>
@endsection