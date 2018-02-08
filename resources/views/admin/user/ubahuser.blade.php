@extends('base')
	@section('css')

	@endsection
	@section('content')
	<section class="content-header">
        <h1>
            User
            <small>Ubah User</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-edit"></i> Home</a></li>
            <li class="active">User</li>
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
		        <form class="form-horizontal" action="{{url('/admin/ubahuser')}}" method="post">
		        <input type="hidden" name="_token" value="{{ csrf_token() }}">
		            <div class="box-body">
	                  <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Username</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="username" value="{{$user['username']}}">
		          			<input type="hidden" name="id" value="{{$user->id}}"/>
		          			</div>
		          		</div>
	       			   <div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Password</label>
		          			<div class="col-sm-3">
		          			<input type="password" class="form-control" name="password" value="{{$user['password']}}">
		          			</div>
		              </div>
		            	<div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">Nama</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="nama" value="{{$user['nama']}}">
		          			</div>
		          		</div><!-- /.box-body -->
		          		<div class="form-group">
		                    <label class="col-sm-2" for="exampleInputEmail1">NIP</label>
		          			<div class="col-sm-3">
		          			<input type="text" class="form-control" name="nip" value="{{$user['nip']}}">
		          			</div>
		          		</div>
		          		<div class="form-group">
                            <label class="col-sm-2" >Role</label>
                            <div class="col-sm-3">
                                <select class="form-control" name="role_id">
                                @foreach($role as $rl)
                                    <option <?php if($user['role_id'] == $rl->id) echo 'selected';?> value="{{$rl->id}}">
                                    	{{$rl['name']}}
                                    </option>
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