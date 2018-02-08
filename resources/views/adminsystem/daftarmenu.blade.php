@extends('base')
@section('css')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection
	@section('content')
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Menu Builder
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="">Menu Builder</li>
        <li class="active">Daftar Menu</li>
      </ol>
    </section>
     <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <h3 class="box-title">Daftar Menu</h3>
            <a href="{{url('/inputmenu')}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-plus"></button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            @if(Session::has('pesan'))
             <div class="alert alert-info alert-dismissable">
                <i class="fa fa-info"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                 {{Session::get('pesan')}}
              </div>
            @endif
              <table class="table table-hover" id="table_akun">
              <thead>
                <tr>
                  <th>Nama Menu</th>
                  <th>Icon</th>
                  <th>Parent</th>
                  <!--<th>User Permission</th>-->
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
               @foreach($menu as $men)
                <tr>
                  <td>{{$men['title']}}</td>
                  <td><i class="{{$men->icon}}"></i></td>
                  <td>{{$men['parent_id']}}</td>
                  <td></td>
                  <td>
                      <div class="btn-group" class="col-sm-3">
                        <a href="{{url('/ubahmenu').'/'.$men['id']}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-edit"></button></a>
                      </div>
                      <div class="btn-group" class="col-sm-3">
                        <a href="{{url('/hapusmenu').'/'.$men['id']}}"><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></button></a>
                      </div>
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
      <!-- /.row -->
    </section>
    <!-- /.content -->
	@endsection
@section('js')
	<!-- DataTables -->
	<script src="{{url('kp')}}/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script>
  $(document).load(() {
    $('#table_akun').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
        });
  });
	</script>
@endsection