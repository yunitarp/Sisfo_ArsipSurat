@extends('base')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('content')
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Surat Masuk
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Surat Masuk</li>
        <li class="active">Data Surat Masuk</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center><h3 class="box-title">Tabel Data Surat Masuk</h3></center>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover" id="table_akun">
              <thead>
                <tr>
                  <th>Tanggal Surat</th>
                  <th>Instansi Pengirim</th>
                  <th>No Surat</th>
                  <th>Divisi</th>
                  <th>Perihal</th>
                  <th>Isi Ringkas</th>
                  <th>Prioritas</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
               @foreach($suratmasuk as $sk)
                <tr>
                  <td>{{$sk['tgl_surat']}}</td>
                  <td>{{$sk['instansi']->nama}}</td>
                  <td>{{$sk['no_surat']}}</td>
                  <td>{{$sk['divisi_id']}}</td>
                  <td>{{$sk['perihal']}}</td>
                  <td>{{$sk['isi_ringkas']}}</td>
                  <td>{{$sk['prioritas']}}</td>
                  <td>
                      <div class="btn-group" class="col-sm-3">
                        <a href="{{url('/ubahsuratmasuk').'/'.$sk['id']}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-edit"></button></a>
                        <a href="{{url('/showsuratmasuk').'/'.$sk['filename']}}"><button type="button" class="btn btn-success btn-sm glyphicon glyphicon-search"></button></a>
                        <a href="{{url('/inputdisposisi').'/'.$sk['id']}}"><button type="button" class="btn btn-warning btn-sm glyphicon glyphicon-share"></button></a>
                        <a href="{{url('/deleteSuratMasuk').'/'.$sk['id']}}"><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></button></a>
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
  $(document).ready(function(){
  @if(Session::has('alert'))
  alert('{{Session::get("alert")}}');
  @endif
  });
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



































