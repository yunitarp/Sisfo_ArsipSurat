@extends('base')
@section('css')

@endsection
	@section('content')
		<section class="content-header">
	      <h1>
	        Ubah Roles
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="">Data</li>
	        <li class="">Data Role User</li>
	      </ol>
	    </section>
	    <section class="content">
	    	<div class="row">
	    	<div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	            <div class="box-header">
	                <h3 class="box-title">Form Ubah Roles</h3>
	            </div><!-- /.box-header -->
	            	<!-- form start -->
			        <form class="form-horizontal" action="{{url('/ubahroles')}}" method="post">
	                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			            <div class="box-body">
			                <div class="form-group">
			                    <label class="col-sm-2" for="exampleInputEmail1">Nama Roles</label>
			          			<div class="col-sm-3">
			          			<input type="text" class="form-control" name="name" value="{{$roles->name}}">
			          			<input type="hidden" name="id" value="{{$roles->id}}"/>
			          			</div>
			            	</div>
			            	<div class="form-group">
			            	<label class="col-sm-2">Menu</label>
				            	<div class="col-sm-3 checkbox">
				            		<ul>
			                        @foreach($menu as $menus)
			                          <label class="checkbox">
			                            <input type="checkbox" name="menu_id[]" value="{{$menus->id}}">
			                             <li><i class="{{$menus->icon}}"></i> {{$menus->title}}</li>
			                             @foreach($menus['children'] as $child)
			                             <label class="checkbox">
			                                <input type="checkbox" name="menu_id[]" value="{{$child->id}}">
			                                <li><i class="{{$child->icon}}"></i> {{$child->title}}</li>
			                              </label>
			                            @endforeach
			                           </label>  
			                        @endforeach
			                      </ul>
				            	</div>
				            </div><!-- /.box-body -->
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