@extends('base')
@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection
	@section('content')
		<!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	          LAPORAN    
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="">Pelaporan</li>
	        <li class="active">Rekap Disposisi</li>
	      </ol>
	    </section>
	    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <center><h3 class="box-title">Rekap Disposisi</h3></center>
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
              <label class="col-sm-2">Filter Unit Kerja:</label>
                <div class="col-sm-2 input-group">
                  <select class="form-control" name="divisi_id" id="divisi">
                    <option <?php if($iddiv == null) echo "selected" ?> value="0">--PILIH UNIT KERJA--</option>
                    @foreach($divisis as $divisi)
                    	<option <?php if($divisi->id == $iddiv) echo "selected" ?> value="{{$divisi->id}}">{{$divisi->nama}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group">
              	<div class="col-sm-2"></div>
                <div class="col-sm-2 input-group">
                	<button onclick="isiDivisi()" class="btn btn-primary pull-right">Submit</button>
                </div>
              </div>
            </div>
            <center><h3 class="box-title">Data Disposisi</h3></center>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table_akun" id="">
              <thead>
                <tr>
                  <th>No Surat</th>
                  <th>Nama Instansi</th>
                  <th>Tanggal Terima</th>
                  <th>Perihal</th>
                  <th>Disposisi Direktur</th>
                  <th>Disposisi Manajer</th>
                  <th>Karyawan Dituju</th>
                  <th>Batas Waktu</th>
                  <th>Status</th>
                  <th>Print</th>
                </tr>
               </thead>
               <tbody>
               @foreach($disposisis as $disposisi)
                <tr>
                  <td>{{$disposisi['suratmasuk']->no_surat}}</td>
                  <td>{{$disposisi->suratmasuk->instansi->nama}}</td>
                  <td>{{$disposisi['suratmasuk']->tgl_terima}}</td>
                  <td>{{$disposisi['perihal']}}</td>
                  <td>{{$disposisi['isi_disposisi']}}</td>
                  <td>{{$disposisi['disposisi_manajer']}}</td>
                  <td>{{$disposisi['karyawan']->nama}}</td>
                  <td>{{$disposisi['batas_waktu']}}</td>
                  <td>{{$disposisi['status']}}</td>
                  <td><a href="{{url('/cetakdisposisi').'/'.$disposisi['id']}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-print"></button></a></td>
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
    <!-- /.content -->
	@endsection
@section('js')
	<!-- DataTables -->
	<script src="{{url('kp')}}/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
		$('.table_akun').DataTable({
		    "paging": true,
		    "lengthChange": true,
		    "searching": true,
		    "ordering": true,
		    "info": true,
		    "autoWidth": true
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

    	var isiDivisi = function(){
    		waktu = $("#rangeWaktu").html();
    		console.log(waktu);
    		start = waktu.substr(0,10);
    		end = waktu.substr(11,10);
    		divisi = $("#divisi").val();
    		if(divisi != 0){
	    		document.location.href = "{{url('/lihatdisposisi')}}/"+ start + '/' + end + '/' + divisi;
    		}
	    	else{
	    		alert('Harap pilih divisi terlebih dahulu');
	    	}
		}
	    
	</script>
@endsection
