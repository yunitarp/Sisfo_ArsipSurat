@extends('base')
@section('css')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection
	@section('content')
	<section class="content-header">
      <h1>
        Menu Permission
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Menu Permission</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
              <div class="box-header">
                <center><h3 class="box-title">Menu Permission</h3></center>
                <form class="form-horizontal" action="{{url('/menupermission')}}" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label class="col-sm-2" >Role</label>
                     <div class="col-sm-3">
                        <select class="form-control" name="role_id">
                            <option selected="selected">--PILIH ROLE--</option>
                            @foreach($role as $rl)
                              <option value="{{$rl->id}}">{{$rl->name}}</option>>
                            @endforeach
                        </select>
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
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </section>
	@endsection

@section('js')

@endsection