<?php

namespace App\Http\Controllers\Data\Cetak;
use App\PenyerapanKeuangan;
use App\Kegiatan;
use App\SubKegiatan;
use App\MAK;
use App\Paket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\DataExportXLSX;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class CetakController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function export() 
    {
        $data['kegiatans'] = Kegiatan::all();
        $data['subKegiatans'] = SubKegiatan::all();
        $data['pakets'] = Paket::all();
        $data['maks'] = MAK::all();
        $data['penyerapanKeuangans'] = PenyerapanKeuangan::all();
        return view('data.cetakData.data')->with($data);
    }
    public function XLSX()
    {
    	return (new DataExportXLSX)->download('RealisasiAnggaran-BNPB.xlsx');
    }
    public function PDF()
    {
        $kegiatans = Kegiatan::all();
        $subKegiatans = SubKegiatan::all();
        $pakets = Paket::all();
        $maks = MAK::all();
        $penyerapanKeuangans = PenyerapanKeuangan::all();
        set_time_limit(300);
        $pdf = PDF::loadView('data.cetakData.pdf', compact('kegiatans', 'subKegiatans', 'pakets', 'maks', 'penyerapanKeuangans'))->setPaper('a4', 'landscape');;
        return $pdf->download('RealisasiAnggaran-BNPB.pdf');
    }
    public function KegiatanXLSX()
    {
        return Excel::download(new \App\Exports\DataKegiatan, 'kegiatan-BNPB.xlsx');
    }
    public function SubKegiatanXLSX()
    {
        return Excel::download(new \App\Exports\DataSubKegiatan, 'Sub-kegiatan-BNPB.xlsx');
    }
    public function MAKXLSX()
    {
        return Excel::download(new \App\Exports\DataMAK, 'MAK-BNPB.xlsx');
    }
    public function PenyerapanKeuanganXLSX()
    {
    	return Excel::download(new \App\Exports\DataPenyerapanKeuangan, 'PenyerapanKeuangan-BNPB.xlsx');
    }

}
