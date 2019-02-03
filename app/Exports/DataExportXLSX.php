<?php

namespace App\Exports;

use App\PenyerapanKeuangan;
use App\Kegiatan;
use App\SubKegiatan;
use App\MAK;
use App\Paket;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DataExportXLSX implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    
    public function view(): View
    {
        return view('data.cetakData.data', [
            'kegiatans' => Kegiatan::all(),
            'subKegiatans' => SubKegiatan::all(),
            'pakets' => Paket::all(),
            'paketc' => Paket::all()->first(),
            'maks' => MAK::all(),
            'penyerapanKeuangans' => PenyerapanKeuangan::all() 
        ]);
    }
}
