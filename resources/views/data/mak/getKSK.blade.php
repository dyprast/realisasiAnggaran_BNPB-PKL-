@extends('layouts.app')

@section('content')
<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
<link href="{{ asset('/css/custom.css') }}" rel="stylesheet">  
<div class="indicators">
    <div>
        <p class="h1">Data MAK</p>
        <p class="h5">MAK / <a href="#">tambahMAK</a></p>
    </div>
</div>
<div class="container-admin">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form method="GET" action="{{ url('MAK/addData') }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 col-md-12">  
                                <div class="form-group">
                                    <label for="id_subKegiatan">Kegiatan - Sub Kegiatan</label>
                                    <select class="form-control" name="id_subKegiatan" id="id_subKegiatan" required>
                                        <option value="" style="background-color: #111;color: #fff;"></option>
                                    @foreach($subKegiatans as $res)
                                        <option value="{{ $res->id }}">{{ $res->kegiatan->kegiatan }} - {{ $res->sub_kegiatan }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="action-form">
                            <button type="submit" class="btn btn-primary borderrad">Lanjut</button>
                        </div>
                    </form>
                </div>              
            </div>
        </div>
    </div>
</div>
<script>
    swal("Info", "Pilih Kegiatan - Sub Kegiatan Untuk Lanjut", "info");
</script>
@endsection