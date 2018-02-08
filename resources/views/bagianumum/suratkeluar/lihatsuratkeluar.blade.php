@extends('base')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('content')
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Surat Keluar
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Surat Keluar</li>
        <li class="active">Data Surat Keluar</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center><h3 class="box-title">Tabel Data Surat Keluar</h3></center>

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
                  <th>Instansi Tujuan</th>
                  <th>Referensi Surat</th>
                  <th>No Surat</th>
                  <th>Tanggal Surat</th>
                  <th>Perihal</th>
                  <th>Isi Ringkas</th>
                  <th>Prioritas</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
                @foreach($suratkeluar as $sk)
                <tr>
                  <td>{{$sk['instansi']->nama}}</td>
                  <td>@if($sk->suratmasuk_id != "")
                      <a href="{{url('/showsuratmasuk').'/'.$sk['suratmasuk']->filename}}">{{$sk['suratmasuk']->no_surat}}</a>
                      @elseif($sk->suratmasuk_id == "")
                        -
                      @endif
                  </td>
                  <td>{{$sk['no_surat']}}</td>
                  <td>{{$sk['tgl_catat']}}</td>
                  <td>{{$sk['perihal']}}</td>
                  <td>{{$sk['isi_ringkas']}}</td>
                  <td>{{$sk['prioritas']}}</td>
                  <td>
                      <div class="btn-group" class="col-sm-3">
                        <a href=""><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-edit"></button></a>
                        <a href="{{url('/showsuratkeluar').'/'.$sk['filename']}}"><button type="button" class="btn btn-success btn-sm glyphicon glyphicon-search"></button></a>
                        <a href="{{url('/deleteSuratKeluar').'/'.$sk['id']}}"><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></button></a>
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
    "autoWidth": true
  });
</script>
@endsection