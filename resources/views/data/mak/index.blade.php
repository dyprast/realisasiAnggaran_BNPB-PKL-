@extends('layouts.app')

@section('content')
<div class="indicators">
    <div>
        <p class="h1">Data MAK</p>
        <p class="h5">MAK / <a href="#">home</a></p>
    </div>
    <div>
        <a href="{{ url('MAK/xlsx') }}" class="btn btn-primary borderrad"><i class="fas fa-print"></i></a>
        <a href="{{ url('MAK/addData/getKSK') }}" class="btn btn-primary borderrad"><i class="fas fa-plus"></i></a>
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
                        <th scope="col">Sub Kegiatan</th>
                        <th scope="col">Paket</th>
                        <th scope="col">MAK</th> 
                        <th scope="col">Nilai / Dana</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($maks as $res)
                    @if($res->id_paket != NULL)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><p class="text-primary"><b>{{ $res->kode }}</b></p></td>
                        <td>{{ $res->subKegiatan->kegiatan->kegiatan }}</td>
                        <td>{{ $res->subKegiatan->sub_kegiatan }}</td>
                        <td>{{ $res->paket->paket }}. {{ $res->paket->keterangan_paket }}</td>
                        <td>{{ $res->mak }}</td>
                        <td><p class="alert alert-success"><i class="fas fa-money-bill-alt"></i> Rp{{ number_format($res->nilai) }}</p></td>
                        <td class="action-table"><a href="{{ url('MAK/editData/'.$res->id) }}" class="btn btn-secondary borderrad"><i class="fas fa-edit"></i></a> <a href="{{ url('MAK/hapusData/'.$res->id) }}" onclick="return confirm('Konfirmasi hapus Data MAK')" class="btn btn-danger borderrad"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @else
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><p class="text-primary"><b>{{ $res->kode }}</b></p></td>
                        <td>{{ $res->subKegiatan->kegiatan->kegiatan }}</td>
                        <td>{{ $res->subKegiatan->sub_kegiatan }}</td>
                        <td>-</td>
                        <td>{{ $res->mak }}</td>
                        <td><p class="alert alert-success"><i class="fas fa-money-bill-alt"></i> Rp{{ number_format($res->nilai) }}</p></td>
                        <td class="action-table"><a href="{{ url('MAK/editData/'.$res->id) }}" class="btn btn-secondary borderrad"><i class="fas fa-edit"></i></a> <a href="{{ url('MAK/hapusData/'.$res->id) }}" onclick="return confirm('Konfirmasi hapus Data MAK')" class="btn btn-danger borderrad"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection