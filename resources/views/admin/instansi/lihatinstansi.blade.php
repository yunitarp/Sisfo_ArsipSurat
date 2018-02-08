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
        <li><a href="/index"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Data Instasi</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Instansi</h3>
              <a href="{{url('/inputinstansi')}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-plus"></button></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="table_akun">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nama Instansi</th>
                  <th>Alamat Instansi</th>
                  <th>Kota</th>
                  <th>Provinsi</th>
                  <th>No Telepon</th>
                  <th>Fax</th>
                  <th>Email</th>
                  <th>Jenis Instansi</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
               @foreach($instansi as $isi)
                <tr>
                  <td>{{$isi['id']}}</td>
                  <td>{{$isi['nama']}}</td>
                  <td>{{$isi['alamat']}}</td>
                  <td>{{$isi['id_kota']}}</td>
                  <td>{{$isi['id_provinsi']}}</td>
                  <td>{{$isi['no_telp']}}</td>
                  <td>{{$isi['fax']}}</td>
                  <td>{{$isi['email']}}</td>
                  <td>{{$isi['id_jenis']}}</td>
                  <td>
                      <div class="btn-group" class="col-sm-3">
                        <a href="{{url('/ubahinstansi').'/'.$isi['id']}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-edit"></button></a>
                      </div>
                      <div class="btn-group" class="col-sm-3">
                        <a href="{{url('/deleteinstansi').'/'.$isi['id']}}"><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></button></a>
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
    "lengthChange": false,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });
</script>
@endsection