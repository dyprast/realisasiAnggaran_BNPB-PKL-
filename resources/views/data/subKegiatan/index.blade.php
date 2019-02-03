@extends('layouts.app')

@section('content')
<div class="indicators">
    <div>
        <p class="h1">Data Sub Kegiatan</p>
        <p class="h5">SubKegiatan / <a href="#">home</a></p>
    </div>
    <div>
        <a href="{{ url('subKegiatan/xlsx') }}" class="btn btn-primary borderrad"><i class="fas fa-print"></i></a>
        <a href="{{ url('subKegiatan/addData') }}" class="btn btn-primary borderrad"><i class="fas fa-plus"></i></a>
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
                        <th scope="col">Nilai / Dana</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subKegiatans as $res)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><p class="text-primary"><b>{{ $res->kode }}</b></p></td>
                        <td>{{ $res->kegiatan->kegiatan }}</td>
                        <td>{{ $res->sub_kegiatan }}</td>
                        <td><p class="alert alert-success"><i class="fas fa-money-bill-alt"></i> Rp{{ number_format($res->nilai) }}</p></td>
                        <td class="action-table">
                        @if($res->check_pakets == 1)
                            <a href="{{ url('subKegiatan/paket/'.$res->id) }}" class="btn btn-success borderrad"><i class="fas fa-box"></i></a> 
                        @elseif($res->check_pakets == 0)
                            <a href="{{ url('subKegiatan/paket/'.$res->id) }}" class="btn btn-primary borderrad"><i class="fas fa-box"></i></a> 
                        @endif
                            <a href="{{ url('subKegiatan/editData/'.$res->id) }}" class="btn btn-secondary borderrad"><i class="fas fa-edit"></i></a>  
                            <a href="{{ url('subKegiatan/hapusData/'.$res->id) }}" onclick="return confirm('Konfirmasi hapus Data SubKegiatan')" class="btn btn-danger borderrad"><i class="fas fa-trash"></i></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection