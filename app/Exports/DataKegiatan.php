<?php

namespace App\Exports;

use App\Kegiatan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DataKegiatan implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    
    public function view(): View
    {
        return view('data.cetakData.kegiatan', [
            'kegiatans' => Kegiatan::all()
        ]);
    }
}
