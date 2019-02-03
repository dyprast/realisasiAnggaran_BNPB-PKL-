@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">  
<div class="indicators">
    <div>
        <p class="h1">Penyerapan Keuangan</p>
        <p class="h5">PenyerapanKeuangan / <a href="#">editPenyerapanKeuangan</a></p>
    </div>
</div>
<div class="container-admin">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" id="mainForm" name="mainForm" action="{{ url('penyerapanKeuangan/prosesEditData/'.$penyerapanKeuangans->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <select class="form-control" name="id_kegiatan" id="kegiatan" required readonly>
                                    @foreach($kegiatans as $res)
                                        <option value="{{ $res->id }}">{{ $res->kegiatan }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="subKegiatan">Sub Kegiatan</label>
                                    <select class="form-control" name="id_subKegiatan" id="subKegiatan" required readonly>
                                    @foreach($subKegiatans as $res)
                                        <option value="{{ $res->id }}">{{ $res->sub_kegiatan }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="mak">MAK</label>
                                    <select class="form-control" name="id_mak" id="mak" required>
                                        <option value="{{ $penyerapanKeuangans->mak->id }}" style="background-color: #111;color: #fff;">{{ $penyerapanKeuangans->mak->mak }}</option>
                                    @foreach($maks as $res)
                                        <option value="{{ $res->id }}">{{ $res->mak }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="realisasi_kegiatan">Realisasi Kegiatan</label>
                                    <input type="text" class="form-control" id="realisasi_kegiatan" required name="realisasi_kegiatan" value="{{ $penyerapanKeuangans->realisasi_kegiatan }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="realisasi_nilai">Realisasi Nilai (IDR)</label>
                                    <input onkeypress="return isNumberKey(event)" type="text" class="form-control" id="realisasi_nilai" required name="realisasi_nilai" value="{{ $penyerapanKeuangans->realisasi_nilai }}">
                                </div>
                            </div>
                        </div>
                        <div class="action-form">
                            <button type="submit" class="btn btn-primary borderrad">Perbarui</button>
                        </div>
                    </form>
                </div>              
            </div>
        </div>
    </div>
</div>
@endsection