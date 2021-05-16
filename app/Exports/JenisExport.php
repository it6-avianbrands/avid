<?php

namespace App\Exports;

use App\Models\Jenis;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JenisExport implements FromView
{
    public function view(): View
    {
        $jenis = Jenis::select(
            "KodeJenis",
            "KeteranganJenis"
        )->get();

        return view("excel.master.jenis", [
            "header" => array_keys($jenis->first()->getAttributes()),
            "data" => $jenis
        ]);
    }
}