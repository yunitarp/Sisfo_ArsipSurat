@extends('base')
@section('css')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection
	@section('content')
	<section class="content-header">
      <h1>
        Surat Masuk
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Surat Masuk</a></li>
        <li class="active">Tindaklanjuti Surat</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <center><h3 class="box-title">Data Surat Masuk</h3></center>

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
                  <th>Instansi</th>
                  <th>No Surat</th>
                  <th>Perihal</th>
                  <th>Isi Ringkas</th>
                  <th>File Surat</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
                @foreach($suratmasuk as $sk)
                <tr>
                  <td>{{$sk['instansi']->nama}}</td>
                  <td>{{$sk['no_surat']}}</td>
                  <td>{{$sk['perihal']}}</td>
                  <td>{{$sk['isi_ringkas']}}</td>
                  <td><a href="{{url('/showsuratmasuk').'/'.$sk['filename']}}">{{$sk['original_filename']}}</a></td>
                  <td>
                      <div class="btn-group" class="col-sm-3">
                        <a href="{{url('/inputdisposisi').'/'.$sk['id']}}"><button type="button" class="btn btn-success btn-sm glyphicon glyphicon-share"></button></a>
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
	@endsection
@section('js')
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