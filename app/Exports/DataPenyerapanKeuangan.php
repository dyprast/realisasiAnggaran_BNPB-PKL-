<?php

namespace App\Exports;

use App\PenyerapanKeuangan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DataPenyerapanKeuangan implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    
    public function view(): View
    {
        return view('data.cetakData.penyerapanKeuangan', [
            'penyerapanKeuangans' => PenyerapanKeuangan::all()
        ]);
    }
}
