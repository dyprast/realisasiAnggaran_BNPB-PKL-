@extends('layouts.app')

@section('content')
<div class="indicators">
    <div>
        <p class="h1">Data Kegiatan</p>
        <p class="h5">Kegiatan / <a href="#">home</a></p>
    </div>
    <div>
        <a href="{{ url('kegiatan/xlsx') }}" class="btn btn-primary borderrad"><i class="fas fa-print"></i></a>
        <a href="{{ url('kegiatan/addData') }}" class="btn btn-primary borderrad"><i class="fas fa-plus"></i></a>
    </div>
</div>
<div class="container-admin">
    <div class="row">
        <div class="col-md-12 table-wrap">
            <table class="table table-striped">
                <thead>
                    <tr class="bg-primary" style="color: #fff;">
                        <th scope="col">No</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Kegiatan</th>
                        <th scope="col">Nilai / Dana</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kegiatans as $res)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><p class="text-primary"><b>{{ $res->kode }}</b></p></td>
                        <td>{{ $res->kegiatan }}</td>
                        <td><p class="alert alert-success"><i class="fas fa-money-bill-alt"></i> Rp{{ number_format($res->nilai) }}</p></td>
                        <td class="action-table"><a href="{{ url('kegiatan/editData/'.$res->id) }}" class="btn btn-secondary borderrad"><i class="fas fa-edit"></i></a> <a href="{{ url('kegiatan/hapusData/'.$res->id) }}" onclick="return confirm('Konfirmasi hapus Data kegiatan')" class="btn btn-danger borderrad"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection