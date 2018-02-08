@extends('base')
@section('css')

@endsection
	@section('content')
	<section class="content-header">
      <h1>
        Menu Builder <small>Edit Menu</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="">Menu Builder</li>
        <li><a href="">Edit Menu</a>
      </ol>
    </section>
    <section class="content">
    	<div class="row">
    	<div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Form Edit Menu</h3>
            </div>
            <form class="form-horizontal" action="{{url('/ubahmenu')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                	<div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Nama Menu</label>
	          			<div class="col-sm-3">
	          			<input type="text" class="form-control" name="title" value="{{$menu['title']}}">
	          			<input type="hidden" name="id" value="{{$menu->id}}"/>
	          			</div>
          			</div>
          			<div class="form-group">
	                    <label class="col-sm-2" for="exampleInputEmail1">Url</label>
	          			<div class="col-sm-3">
	          			<input type="text" class="form-control" name="url" value="{{$menu->url}}">
	          			</div>
		          	</div>
		          	<div class="form-group">
		          		<label class="col-sm-2" for="exampleInputEmail1">Icon</label>
		          		<div class="col-sm-3">
	          			<input type="text" class="form-control" name="icon" value="{{$menu->icon}}">
	          			</div>
		          	</div>
		          	<div class="form-group">
		          		<label class="col-sm-2" for="exampleInputEmail1">Menu Parent</label>
		          		<div class="col-sm-3">
	          			<select class="form-control" name="parent_id">
                            <option <?php if($menu['parent_id'] == 0) echo "selected"; ?> value="0">Tidak memiliki parent</option>
                            @foreach($menus as $men)
                                <option <?php if($menu['parent_id'] == $men->id) echo "selected";?> value="{{$men->id}}">{{$men->title}}</option>
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