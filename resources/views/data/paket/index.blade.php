@extends('layouts.app')

@section('content')
<div class="indicators">
    <div>
        <p class="h1">Paket Sub Kegiatan</p>
        <p class="h5">SubKegiatan / Paket / <a href="#">{{ $subKegiatans->sub_kegiatan }}</a></p>
    </div>
    <div>
        <a href="{{ url('subKegiatan/paket/addData/'.$subKegiatans->id) }}" class="btn btn-primary borderrad"><i class="fas fa-plus"></i></a>
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
                        <th scope="col">Paket</th>
                        <th scope="col">Keterangan Paket</th>
                        <th scope="col">Nilai / Dana</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pakets as $res)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $res->subKegiatan->kegiatan->kegiatan }}</td>
                        <td>{{ $res->subKegiatan->sub_kegiatan }}</td>
                        <td>{{ $res->paket }}</td>
                        <td>{{ $res->keterangan_paket }}</td>
                        <td><p class="alert alert-success"><i class="fas fa-money-bill-alt"></i> Rp{{ number_format($res->nilai) }}</p></td>
                        <td class="action-table"><a href="{{ url('subKegiatan/paket/editData/'.$subKegiatans->id.'/'.$res->id) }}" class="btn btn-secondary borderrad"><i class="fas fa-edit"></i></a>  <a href="{{ url('subKegiatan/paket/hapusData/'.$subKegiatans->id.'/'.$res->id) }}" onclick="return confirm('Konfirmasi hapus Data Paket SubKegiatan')" class="btn btn-danger borderrad"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection