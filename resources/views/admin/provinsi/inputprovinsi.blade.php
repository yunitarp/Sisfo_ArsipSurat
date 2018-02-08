@extends('base')
	@section('css')
	@endsection

	@section('content')
		<section class="content-header">
	      <h1>
	        Kelola Provinsi
	        <small></small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i>Kelola Provinsi</a></li>
	        <li class="active">Tambah Provinsi</li>
	      </ol>
	    </section>
	    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Provinsi Baru</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/inputprovinsi')}}" method="post">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="box-body">
		                  <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Nama Provinsi</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Provinsi">
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

@endsection