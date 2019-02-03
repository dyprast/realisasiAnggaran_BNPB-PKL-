@extends('layouts.app')

@section('content')
<div class="indicators">
    <div>
        <p class="h1">Penyerapan Keuangan</p>
        <p class="h5">Penyerapan Keuangan / <a href="#">home</a></p>
    </div>
    <div>
        <a href="{{ url('penyerapanKeuangan/xlsx') }}" class="btn btn-primary borderrad"><i class="fas fa-print"></i></a>
        <a href="{{ url('penyerapanKeuangan/addData/getSubKegiatan') }}" class="btn btn-primary borderrad"><i class="fas fa-plus"></i></a>
    </div>
</div>
<div class="container-admin">
    <div class="row">
        <div class="col-md-12 table-wrap">
            <table class="table table-striped">
                <thead>
                    <tr class="bg-primary" style="color: #fff;">
                        <th scope="col">No</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Sub Kegiatan</th>
                        <th scope="col">MAK</th>
                        <th scope="col">Realisasi Kegiatan</th>
                        <th scope="col">Realisasi Nilai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($penyerapanKeuangans as $res)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $res->mak->subKegiatan->kegiatan->kegiatan }}</td>
                        <td>{{ $res->mak->subKegiatan->sub_kegiatan }}</td>
                        <td>{{ $res->mak->mak }}</td>
                        <td>{{ $res->realisasi_kegiatan }}</td>
                        <td><p class="alert alert-success"><i class="fas fa-money-bill-alt"></i> Rp{{ number_format($res->realisasi_nilai) }}</p></td>
                        <td class="action-table"><a href="{{ url('penyerapanKeuangan/editData/'.$res->id) }}" class="btn btn-secondary borderrad"><i class="fas fa-edit"></i></a> <a href="{{ url('penyerapanKeuangan/hapusData/'.$res->id) }}" onclick="return confirm('Konfirmasi hapus Data Penyerapan Keuangan')" class="btn btn-danger borderrad"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection