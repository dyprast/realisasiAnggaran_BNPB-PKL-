@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">  
<div class="indicators">
    <div>
        <p class="h1">Data Sub Kegiatan</p>
        <p class="h5">SubKegiatan / <a href="#">tambahSubKegiatan</a></p>
    </div>
</div>
<div class="container-admin">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('simpanDataSubKegiatan') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="kegiatan">Kegiatan</label>
                                    <select class="form-control" name="kegiatan" id="kegiatan" required>
                                        <option value="" style="background-color: #111;color: #fff;"></option>
                                    @foreach($kegiatans as $res)
                                        <option value="{{ $res->id }}">{{ $res->kegiatan }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div> 
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="kode">Kode Sub Kegiatan</label>
                                    <input onkeypress="return isNumberKey(event)" type="text" class="form-control" id="kode" required name="kode">
                                </div>
                            </div>
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="sub_kegiatan">Sub Kegiatan</label>
                                    <input type="text" class="form-control" id="sub_kegiatan" required name="sub_kegiatan">
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