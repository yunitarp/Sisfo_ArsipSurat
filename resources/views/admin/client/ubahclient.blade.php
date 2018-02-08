@extends('base')
	@section('css')

	@endsection
	@section('content')
		<section class="content-header">
	      <h1>
	        Data Client
	        <small></small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i>Data Client</a></li>
	        <li class="active">Ubah Client</li>
	      </ol>
	    </section>
	    <section class="content">
    	<div class="row">
	    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	            <div class="box-header">
	                <h3 class="box-title">Form Ubah Client</h3>
	            </div><!-- /.box-header -->
	            	<!-- form start -->
			        <form class="form-horizontal" action="{{url('/ubahclient')}}" method="post">
	                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			            <div class="box-body">
			                <div class="form-group">
			                    <label class="col-sm-2" for="exampleInputEmail1">Jenis Client</label>
			          			<div class="col-sm-3">
			          			<input type="text" class="form-control" name="jenis_client" value="{{$client['jenis_client']}}">
			          			<input type="hidden" name="id" value="{{$client->id}}"/>
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