@extends('adminsystem.base')
@section('css')
	<!-- DataTables -->
  <link rel="stylesheet" href="{{url('kp')}}/plugins/datatables/dataTables.bootstrap.css">
@endsection
	@section('content')
		<section class="content-header">
	      <h1>
	        User Management
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li class="">User</li>
	      </ol>
	    </section>
	    <section class="content">
	      <div class="row">
	        <div class="col-xs-12">
	          <div class="box">
	            <div class="box-header">
	              <form class="form-horizontal " action="{{url('/usermanagement')}}" method="POST">
	              	<div class="form-group">
	                    <label class="col-sm-2" >Jenis User</label>
	                    <div class="col-sm-3">
	                        <select class="form-control" name="roles" id="roles" onchange="isiRoles($(this))">
	                        	<option selected="selected">--PILIH JENIS USER--</option>
	                            <option value="karyawan">Karyawan</option>
	                            <option value="nonkaryawan">Non-Karyawan</option>
	                        </select>
	                    </div>
	                </div>
	              </form>
	            </div>
	            <!-- /.box-header -->
	            <div class="box-body table-responsive no-padding">
	              <table class="table table-hover" id="table_akun">
	              <thead>
	                <tr>
	                  <th>Nama</th>
	                  <th>NIP</th>
	                  <th>Roles</th>
	                  <th>Action</th>
	                </tr>
	               </thead>
	               <tbody>
	               @foreach($user as $user)
	                <tr>
	                  <td>{{$user['nama']}}</td>
	                  <td></td>
	                  <td></td>
	                  <td>
	                      <div class="btn-group" class="col-sm-3">
	                        <a href=""><button type="button" class="btn btn-info btn-sm glyphicon glyphicon-edit"></button></a>
	                      </div>
	                      <div class="btn-group" class="col-sm-3">
	                        <a href=""><button type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"></button></a>
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
<script type="text/javascript">
	var isiRoles = function(obj){
        document.location.href = "{{url('/usermanagement')}}/"+obj.val()
</script>
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