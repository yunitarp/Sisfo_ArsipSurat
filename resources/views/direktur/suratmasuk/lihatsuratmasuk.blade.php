@extends('base')
@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('content')
	
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          LAPORAN    
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="">Pelaporan</li>
        <li class="active">Rekap Surat</li>
      </ol>
    </section>

    <!-- Main content -->
     <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <center><h3 class="box-title">Rekap Surat Masuk dan Keluar</h3></center>
            </div>
            <form class="form-horizontal" action="" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="box-body">
                <div class="form-group">
                <label class="col-sm-2">Pilih Tanggal:</label>
                <div class="col-sm-3 input-group">
                  <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      {{$before."-".$after}}
                    </span>
                    <i class="fa fa-caret-down"></i>
                  </button>
                </div>
              </div>
            </div>
            </form>
            <center><h3 class="box-title">Tabel Data Surat Masuk</h3></center>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table_akun" id="">
              <thead>
                <tr>
                  <th>Nama Instansi</th>
                  <th>Jumlah Surat Masuk</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
               @foreach($suratmasuk as $sr)
                <tr>
                  <td>{{$sr['instansi']->nama}}</td>
                  <td>{{$sr['jml']}}</td>
                  <td><a href="{{url('/detailsuratmasuk').'/'.$before.'/'.$after.'/'.$sr['instansi_id']}}">
                        <button type="button" class="btn btn-info btn-sm glyphicon glyphicon-eye-open"></button>
                      </a>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <center><h3 class="box-title">Tabel Data Surat Keluar</h3></center>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover table_akun" id="">
              <thead>
                <tr>
                  <th>Nama Instansi</th>
                  <th>Jumlah Surat Keluar</th>
                  <th>Action</th>
                </tr>
               </thead>
               <tbody>
               @foreach($suratkeluar as $sr)
                <tr>
                  <td>{{$sr['instansi']->nama}}</td>
                  <td>{{$sr['jum']}}</td>
                  <td><td><a href="{{url('/detailsuratkeluar').'/'.$before.'/'.$after.'/'.$sr['instansi_id']}}"><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-eye-open"></button></a></td</td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>

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
  var isiTanggal = function(obj){
     document.location.href = "{{url('/rekapsuratmasuk')}}/"+obj.val()
  }
  $('.table_akun').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });

  var daterangepicker_start = jQuery("#daterangepicker_start").val(); 
  var daterangepicker_end = jQuery("#daterangepicker_end").val();
  $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          document.location.href = "{{url('/rekapsuratmasuk').'/'}}"+start.format('YYYY-MM-DD') + '/' + end.format('YYYY-MM-DD');
          // $('#daterange-btn span').html(start.format('YYYY/MM/DD') + '-' + end.format('YYYY/MM/DD'));
        }
    );
</script>
@endsection