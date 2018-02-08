@extends('base')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('content')
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data User
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
        <li class="">Data User</li>
        <li class="active">Lihat Data User</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <h3 class="box-title">Tabel Data User</h3>
            <a href="{{url('/inputuser')}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-plus"></button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="table_akun">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Nip</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
               @foreach($user as $isi)
                <tr>
                  <td>{{$isi['username']}}</td>
                  <td>{{$isi['nama']}}</td>
                  <td>{{$isi['nip']}}</td>
                  <td>{{$isi['role']->name}}</td>
                  <td>
                      <div class="btn-group" class="col-sm-3">
                        <a href="{{url('/ubahuser').'/'.$isi['id']}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-edit"></button></a>
                      </div>
                      <div class="btn-group" class="col-sm-3">
                        <a href="{{url('/deleteuser').'/'.$isi['id']}}"><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></button></a>
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