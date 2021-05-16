<?php

namespace App\Exports;

use App\Models\Ukuran;
use Maatwebsite\Excel\Concerns\FromCollection;

class UkuranExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Ukuran::all();
    }
}