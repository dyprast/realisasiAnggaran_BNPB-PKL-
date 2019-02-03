<?php

namespace App\Exports;

use App\MAK;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class DataMAK implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;
    
    public function view(): View
    {
        return view('data.cetakData.mak', [
            'maks' => MAK::all()
        ]);
    }
}
