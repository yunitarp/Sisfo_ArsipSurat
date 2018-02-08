<html>
<head>
	<title>Cetak Disposisi</title>
	<script>window.print()</script>
	<style>
		table, th, td{
			border : 1px solid black;
		}
	</style>
	</head>
<body>
<table border="1" cellspacing="0" style = "width:50%"> 
              <thead>
              	<center><h3 class="box-title">LEMBAR DISPOSISI SURAT MASUK</h3></center>
               </thead>
               <tbody>
               <tr>
                  <th align="left">Surat Dari</th>
                  <td>{{$disposisi->suratmasuk->instansi->nama}}</td>
                </tr>
                <tr>
                	<th align="left">No Surat</th>
                	<td>{{$disposisi->suratmasuk->no_surat}}</td>
                </tr>
                <tr>
                	<th align="left">Tanggal Surat</th>
                	<td>{{$disposisi->suratmasuk->tgl_surat}}</td>
                </tr>
                <tr>
                	<th align="left">Diterima Tanggal</th>
                	<td>{{$disposisi->suratmasuk->tgl_terima}}</td>
                </tr>
                <tr>
                	<th align="left">No Agenda</th>
                	<td>{{$disposisi->suratmasuk->no_agenda}}</td>
                </tr>
                <tr>
                	<th align="left">Sifat</th>
                	<td>{{$disposisi->suratmasuk->prioritas}}</td>
                </tr>
                <tr>
                	<th align="left">Perihal</th>
                	<td>{{$disposisi->suratmasuk->perihal}}</td>
                </tr>
                <tr>
                	<th align="left">Disposisi Direktur</th>
                	<td>{{$disposisi->isi_disposisi}}</td>
                </tr>
                <tr>
                	<th align="left">Disposisi Manajer</th>
                	<td>{{$disposisi->disposisi_manajer}}</td>
                </tr>
                <tr>
                	<th align="left">Untuk Karyawan</th>
                	<td>{{$disposisi->karyawan->nama}}</td>
                </tr>
                <tr>
                	<th align="left">Paraf Direktur</th>
                	<td></td>
                </tr>
                     <tr>
                	<th align="left">Paraf Bagian Umum</th>
                	<td></td>
                </tr>
                <tr></tr>
                <tr></tr>
               </tbody>
              </table>
</body>

</html>