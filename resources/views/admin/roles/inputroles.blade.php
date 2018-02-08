@extends('base')
@section('css')
<!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection
	@section('content')
		<section class="content-header">
	      <h1>
	        Data Roles
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="">Roles</li>
	      </ol>
	    </section>
	    <section class="content">
	    	<div class="row">
	    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	            <div class="box-header">
	                <h3 class="box-title">Form Input Client</h3>
	            </div><!-- /.box-header -->
	            	<!-- form start -->
			        <form class="form-horizontal" action="{{url('/inputroles')}}" method="post">
	                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			            <div class="box-body">
			                <div class="form-group">
			                    <label class="col-sm-2" for="exampleInputEmail1">Nama Roles</label>
			          			<div class="col-sm-3">
			          			<input type="text" class="form-control" name="name" placeholder="Masukkan Roles">
			          			</div>
			            </div><!-- /.box-body -->

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
<!-- DataTables -->
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
