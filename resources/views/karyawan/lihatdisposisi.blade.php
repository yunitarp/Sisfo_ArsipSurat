@extends('base')
@section('css')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection
	@section('content')
		<!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	          Disposisi
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
	        <li class="">Disposi</li>
	        <li class="active">Lihat Disposisi</li>
	      </ol>
	    </section>
	    <section class="content">
	      <div class="row">
	        <div class="col-xs-12">
	          <div class="box">
	            <div class="box-header">
	            <center><h3 class="box-title">Data Disposisi</h3></center>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover" id="table_akun">
	              <thead>
	                <tr>
	                  <th>No Surat Masuk</th>
	                  <th>Nama Instansi</th>
	                  <th>Disposisi Direktur</th>
	                  <th>Disposisi Manajer</th>
	                  <th>Batas Waktu</th>
	                  <th>Catatan</th>
	                  <th>Status</th>
	                  <th>Action</th>
	                </tr>
	               </thead>
	               <tbody>
	               @foreach($disposisi as $disposisis)
	                <tr>
	                  <td>{{$disposisis->suratmasuk->no_surat}}</td>
	                  <td>{{$disposisis->suratmasuk->instansi->nama}}</td>
	                  <td>{{$disposisis->isi_disposisi}}</td>
	                  <td>{{$disposisis->disposisi_manajer}}</td>
	                  <td>{{$disposisis->batas_waktu}}</td>
	                  <td>{{$disposisis->catatan}}</td>
	                  <td>{{$disposisis->status}}</td>
	                  <td>
	                  	<a href="{{url('/ubahdisposisi').'/'.$disposisis['id']}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-edit"></button></a>
	                  	<a href="{{url('/cetakdisposisi').'/'.$disposisis['id']}}"><button type="button" class="btn btn-success btn-sm glyphicon glyphicon-print"></button></a>
	                  </td>
	                </tr>
	                @endforeach
	                </tbody>
	              </table>
	            </div>
	            <!-- /.box-body -->
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
	<script src="{{url('kp')}}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
  <script>
    $('#table_akun').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true
    });
  </script>
@endsection