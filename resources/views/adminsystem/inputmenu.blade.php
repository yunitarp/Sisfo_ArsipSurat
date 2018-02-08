@extends('base')
@section('css')

@endsection
	@section('content')
	<section class="content-header">
      <h1>
        Menu Builder <small>Input Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="">Menu Builder</li>
        <li><a href="">Input Menu</a>
      </ol>
    </section>
    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Input Menu</h3>
            </div>
            <form class="form-horizontal" action="{{url('/inputmenu')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                	<div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Nama Menu</label>
	          			<div class="col-sm-3">
	          			<input type="text" class="form-control" name="title" placeholder="Masukkan Nama Menu">
	          			</div>
          			</div>
          			<div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Url</label>
	          			<div class="col-sm-3">
	          			<input type="text" class="form-control" name="url" placeholder="Masukkan Url">
	          			</div>
		          	</div>
		          	<div class="form-group">
		          		<label class="col-sm-2" for="exampleInputEmail1">Icon</label>
		          		<div class="col-sm-3">
	          			<input type="text" class="form-control" name="icon" placeholder="Masukkan Icon">
	          			</div>
		          	</div>
		          	<div class="form-group">
		          		<label class="col-sm-2" for="exampleInputEmail1">Menu Parent</label>
		          		<div class="col-sm-3">
	          			<select class="form-control" name="parent_id">
                            <option selected="selected">--PILIH MENU PARENT--</option>
                            <option value="0">Tidak memiliki parent</option>
                            @foreach($menu as $menus)
                                <option value="{{$menus['id']}}">{{$menus['title']}}</option>
                            @endforeach    
                        </select>
		          		</div>
		          	</div>
		          	<div class="box-footer">
		                <button type="submit" class="btn btn-primary">Submit</button>
		            </div>
                </div>
            </form>
        </div>
        </div>
        </div>
    </section>
	@endsection
@section('js')

@endsection