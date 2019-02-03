<?php

namespace App\Exports;

use App\SubKegiatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DataSubKegiatan implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    
    public function view(): View
    {
        return view('data.cetakData.subKegiatan', [
            'subKegiatans' => SubKegiatan::all()
        ]);
    }
}
