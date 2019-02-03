@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">  
<div class="indicators">
    <div>
        <p class="h1">Data MAK</p>
        <p class="h5">MAK / <a href="#">editMAK</a></p>
    </div>
</div>
<div class="container-admin">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ url('MAK/prosesEditData/'.$maks->id) }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="id_subKegiatan">Kegiatan - Sub Kegiatan</label>
                                    <select class="form-control" name="id_subKegiatan" id="id_subKegiatan" required readonly>
                                        <option value="{{ $maks->id_subKegiatan }}" style="background-color: #111;color: #fff;">{{ $maks->subKegiatan->kegiatan->kegiatan }} - {{ $maks->subKegiatan->sub_kegiatan }}</option>
                                    </select>
                                </div>
                            </div>
                        @if($paketc != NULL)
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="paket">Paket</label>
                                    <select class="form-control" name="id_paket" id="paket" required>
                                        @foreach($pakets as $res3)
                                            <option value="{{ $res3->id }}">{{ $res3->paket }}. {{ $res3->keterangan_paket }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="kode">Kode MAK</label>
                                    <input onkeypress="return isNumberKey(event)" type="text" class="form-control" id="kode" required name="kode" value="{{ $maks->kode }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="mak">MAK</label>
                                    <input type="text" class="form-control" id="mak" required name="mak" value="{{ $maks->mak }}">
                                </div>
                            </div>
                            <div class="col-12 col-md-3">  
                                <div class="form-group">
                                    <label for="nilai">Nilai / Dana (IDR)</label>
                                    <input onkeypress="return isNumberKey(event)" type="text" class="form-control" id="nilai" required name="nilai" value="{{ $maks->nilai }}">
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