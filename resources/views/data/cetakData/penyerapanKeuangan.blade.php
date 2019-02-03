<title>Realisasi Anggaran BNPB</title>
<link rel="icon" href="{{ asset('img/icon.png') }}">
<style>
	*{
		font-family: sans-serif;
	}
	tr{
		height: 40px;
	}
	td{
		padding: 10px;
	}
	.header{
		text-align: center;
	}
	.header img{
		width: 100px;
	}
</style>
<div class="header">
	<img src="{{ asset('img/icon.png') }}">
	<h2>DATA PENYERAPAN KEUANGAN REALISASI ANGGARAN BNPB</h2>
</div>
<table style="width:100%" border="1">
  <tr style="font-weight: bold;border: 1;">
  	<th style="text-align: center;">No</th>
    <th style="text-align: center;">ID</th>
  	<th style="text-align: center;">Kode</th>
  	<th style="text-align: center;">Kegiatan</th>
    <th style="text-align: center;">Sub Kegiatan</th>
    <th style="text-align: center;">MAK</th>
    <th style="text-align: center;">Realisasi Kegiatan</th>
  	<th style="text-align: center;">Realisasi Nilai</th>
    <th style="text-align: center;">Dibuat Pada</th>
    <th style="text-align: center;">Diperbarui Pada</th>  
  </tr>
  @foreach($penyerapanKeuangans as $res)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $res->id }}</td>
    <td>{{ $res->kode }}</td>
    <td>{{ $res->mak->subKegiatan->kegiatan->kegiatan }}</td>
    <td>{{ $res->mak->subKegiatan->sub_kegiatan }}</td>
    <td>{{ $res->mak->mak }}</td>
    <td>{{ $res->realisasi_kegiatan }}</td>
    <td>{{ number_format($res->realisasi_nilai) }}</td>
    <td>{{ $res->created_at }}</td>
    <td>{{ $res->updated_at }}</td>
  </tr>
  @endforeach
</table>