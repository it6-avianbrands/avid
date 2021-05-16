<?php

namespace App\Exports;

use App\Models\Merk;
use Maatwebsite\Excel\Concerns\FromCollection;

class MerkExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Merk::all();
    }
}