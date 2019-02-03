@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">  
<div class="indicators">
    <div>
        <p class="h1">Paket Sub Kegiatan</p>
        <p class="h5">SubKegiatan / Paket / tambahData / <a href="#">{{ $subKegiatans->sub_kegiatan }}</a></p>
    </div>
</div>
<div class="container-admin">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('subKegiatan/paket/simpanData/'.$subKegiatans->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="paket">Paket</label>
                                    <input type="text" class="form-control" id="paket" required name="paket">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="keterangan_paket">Keterangan Paket</label>
                                    <input type="text" class="form-control" id="keterangan_paket" required name="keterangan_paket">
                                </div>
                            </div>
                        </div>
                        <div class="action-form">
                            <button type="submit" class="btn btn-primary borderrad">Tambah</button>
                        </div>
                    </form>
                </div>              
            </div>
        </div>
    </div>
</div>
@endsection