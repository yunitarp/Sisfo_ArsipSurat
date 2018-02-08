@extends('base')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection
	@section('content')
	<section class="content-header">
      <h1>
        Laporan Surat Keluar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Laporan</li>
        <li class="active">Laporan Surat Keluar</li>
      </ol>
    </section>
    <section class="content">
    	<div class="row">
    		<div class="col-xs-12">
    			<div class="box box-primary">
    				<div class="box-header">
		                <h3 class="box-title">Detail Surat Keluar</h3>
		                <center><h3 class="box-title">Tabel Data Surat Keluar</h3></center>
			            <div class="box-body table-responsive no-padding">
			              <table class="table table-hover table_akun" id="">
			              <thead>
			                <tr>
			                  <th>Instansi Tujuan</th>
			                  <th>No Surat</th>
			                  <th>Tanggal Surat</th>
			                  <th>Isi Ringkas</th>
			                  <th>Action</th>
			                </tr>
			               </thead>
			               <tbody>
			               @foreach($suratkeluar as $sr)
			                <tr>
			                  <td>{{$sr['instansi']->nama}}</td>
			                  <td>{{$sr['no_surat']}}</td>
			                  <td>{{$sr['tgl_surat']}}</td>
			                  <td>{{$sr['isi_ringkas']}}</td>
			                  <td></td>
			                </tr>
			                @endforeach
			                </tbody>
			              </table>
			            </div>
		            </div>
    			</div>
    		</div>
    	</div>
    </section>
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
    "autoWidth": false
  });

</script>
@endsection