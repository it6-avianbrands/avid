<?php

namespace App\Exports;

use App\Models\Ukuran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class UkuranExport implements FromView
{
    public function view(): View
    {
        $ukuran = Ukuran::select(
            "KodeUkuran",
            "KeteranganUkuran"
        )->get();

        return view("excel.master.ukuran", [
            "header" => array_keys($ukuran->first()->getAttributes()),
            "data" => $ukuran
        ]);
    }
}