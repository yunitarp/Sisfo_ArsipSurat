@extends('base')
	@section('css')
	@endsection

	@section('content')
		<section class="content-header">
	      <h1>
	        
	        <small></small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i>Kelola User</a></li>
	        <li class="active">Tambah User</li>
	      </ol>
	    </section>
	    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input User Baru</h3>
            </div><!-- /.box-header -->
            	<!-- form start -->
		        <form class="form-horizontal" action="{{url('/inputuser')}}" method="post">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="box-body">
	                  <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Username</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="username" placeholder="Masukkan Username">
		          			</div>
		          		</div>
	       			   <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Password</label>
		          			<div class="col-sm-3">
		          			<input type="password" class="form-control" name="password" placeholder="Masukkan Password">
		          			</div>
		              </div>
		            	<div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Nama</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
		          			</div>
		          		</div><!-- /.box-body -->
		          		<div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">NIP</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="nip" placeholder="Masukkan NIP">
		          			</div>
		          		</div>
		          		<div class="form-group">
                            <label class="col-sm-2" >Level</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="role_id">
                                    <option selected="selected">--PILIH ROLE--</option>
                                    @foreach($role as $rl)
                                    	<option value="{{$rl->id}}">{{$rl->name}}</option>>
                                    @endforeach
                                </select>
                            </div>
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

@endsection