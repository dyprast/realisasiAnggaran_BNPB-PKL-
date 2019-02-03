@extends('layouts.app')

@section('content')
<div class="indicators">
    <div>
        <p class="h1">Dashboard</p>
        <p class="h5">Dashboard</p>
    </div>
</div>
<div class="container-admin">
    <div class="row">
        <div class="col-md-5">
            <a href="{{ url('kegiatan') }}" style="text-decoration: none;"><div class="card-dashboard">
                <i class="fas fa-chart-bar"></i><br>
                <p class="h3">Data Kegiatan</p>
            </div></a>
        </div>
        <div class="col-md-4">
            <a href="{{ url('penyerapanKeuangan') }}" style="text-decoration: none;"><div class="card-dashboard">
                <i class="fas fa-money-bill-alt"></i><br>
                <p class="h3">Penyerapan Keuangan</p>
            </div></a>
        </div>
    </div>
    <div class="copyright-dashboard">
        <p>Copyright © 2019, BNPB</p>
    </div>
</div>
@endsection