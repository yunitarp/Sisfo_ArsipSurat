@extends('base')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('content')
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Karyawan
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Data Karyawan</li>
        <li class="active">Lihat Data Karyawan</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabel Data Karyawan</h3>
              <a href="{{url('/inputkaryawan')}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-plus"></button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="table_akun">
              <thead>
                <tr>
                  <th>Username</th>
                  <th>NIK</th>
                  <th>Nama</th>
                  <th>Roles</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
               @foreach($karyawan as $kar)
                <tr>
                  <td>{{$kar['username']}}</td>
                  <td>{{$kar['nik']}}</td>
                  <td>{{$kar['nama']}}</td>
                  <td><small class="label bg-yellow">{{$kar['role']->name}}</small></td>
                  <td>
                      <div class="btn-group" class="col-sm-4">
                        <a href="{{url('/ubahkaryawan').'/'.$kar['id']}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-edit"></button></a>
                        <a href="{{url('/deletekaryawan').'/'.$kar['id']}}"><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></button></a>
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